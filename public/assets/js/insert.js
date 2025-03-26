
async function handleFile(route) {
    const input = document.getElementById("file");
    const userid = document.querySelector('meta[name="user_id"]').getAttribute('content');


    if (!input.files.length) {
        alert("Please select a file");
        return;
    }


    // if(file.name.split('.')[1] != 'txt') {

    // console.log(file.name.split('.')[1]);


    if (!input.files.length) {
        alert("Please select a file");
        let myModal = bootstrap.Modal.getInstance(document.getElementById('uploadmodal'));
        myModal.hide();
        return;
    }

    const file          = input.files[0];
    const reader        = new FileReader();
    const transactions  = [];
    const fileEXT       = file.name.split('.')[1];



    if(fileEXT == 'txt') {
        console.log('uploading text');

        reader.onload = async function (event) {


            const lines = event.target.result.split("\n");
            for (let i = 0; i < lines.length; i++) {
                let line = lines[i];
                
                const dateMatches = line.match(/(\d{2}\/\d{2}\/\d{2})/g);


                if(dateMatches) {
                    let splits  = line.split(/\s+/);
                    let upi_rrn = "N/A";
                    let ammount = 0;
                    let iscredit = 0;
                    let ok = false;
                    let hashed = SparkMD5.hash(line);
                    if(splits[1].match(/(\d{2}\/\d{2}\/\d{2})/) && splits[2].match(/(\d{2}\/\d{2}\/\d{2})/)) {
                        // console.log(SparkMD5.hash(line));
                        let l = i + 1;
                        let max = l + 3;
            
                        do { 
                            
                            if(lines[l].match(/UPI\/RRN/g)) {
                                upi_rrn = lines[l].split(/\s+/g)[2].split(/\//g)[0];
                                ammount  = parseFloat(splits[splits.length - 3].replace(/,/g, ""));
                                iscredit = 1;
                                ok = true;
                                break;
                            }

                            else if(lines[l].match(/\d{10,12}/g)) {
                                upi_rrn = lines[l].match(/\d{10,12}/g)[0];
                                ammount  = parseFloat(splits[splits.length - 3].replace(/,/g, ""));
                                iscredit = 0;
                                ok = true;
                                break;
                            }

                            l++;
                        } while(!lines[l].match(/(\d{2}\/\d{2}\/\d{2})/g) && !lines[l].match(/UPI\/RRN/g) && !lines[l].match(/\b\d{12}\b/) && l <= max);
                        
                    }
                    if(ok) {
                        transactions.push({ upi_rrn: upi_rrn, ammount: ammount, iscredit: iscredit, upload_by: userid, hash: hashed });
                    }
                }

                
            }
            // console.log(transactions);


            await sendInChunks(transactions, route);
            
            let myModal = bootstrap.Modal.getInstance(document.getElementById('uploadmodal'));
            myModal.hide();
            window.location.reload();
        
            
            
        };
            

        reader.readAsText(file);

    }
    

    
     else if (fileEXT == 'xls') {

        reader.onload = async function (event) {

            
            const data = new Uint8Array(event.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const sheet = workbook.Sheets[workbook.SheetNames[0]];
            const sheetData = XLSX.utils.sheet_to_json(sheet, { header: 1 });
             // Convert sheet to JSON

            for(let i = 0; i < sheetData.length; i++) {
                let row = sheetData[i];


                let date = row[0];
                if(date === undefined){
                    continue;
                }

                
                if(date.match(/(\d{2}\/\d{2}\/\d{2})/g)) {
                    // console.log(row);
                    let upi_rrn = "N/A";
                    let ammount = 0;
                    let iscredit = 0;
                    let hashed = SparkMD5.hash(row.toString());

                    let upi = row[4].match(/\d{10,12}/g);

                    if(upi) { // credit

                        let a       = parseFloat(row[6].replace(/,/g, ""));

                        if(!isNaN(a)) {
                            upi_rrn     = upi[0];
                            ammount     = a;
                            iscredit    = 1;
                        } else {
                            upi_rrn     = upi[0];
                            ammount     = parseFloat(row[5].replace(/,/g, ""));
                            iscredit    = 0;
                        }

                        
                        transactions.push({ upi_rrn: upi_rrn, ammount: ammount, iscredit: iscredit, upload_by: userid, hash: hashed });
                    }
                    else {
                        let a       = parseFloat(row[6].replace(/,/g, ""));

                        if(!isNaN(a)) {
                            upi_rrn     = '0';
                            ammount     = a;
                            iscredit    = 1;
                        } else {
                            upi_rrn     = '0';
                            ammount     = parseFloat(row[5].replace(/,/g, ""));
                            iscredit    = 0;
                        }
                        if(!isNaN(ammount)) {
                            transactions.push({ upi_rrn: upi_rrn, ammount: ammount, iscredit: iscredit, upload_by: userid, hash: hashed });
                        }
                    }
                   
                }
               
            }
            console.log(transactions);
            await sendInChunks(transactions, route);
            let myModal = bootstrap.Modal.getInstance(document.getElementById('uploadmodal'));
            myModal.hide();
            window.location.reload();

        }

        reader.readAsArrayBuffer(file);


    }

    else {
        alert('Unsupported file format');
        let myModal = bootstrap.Modal.getInstance(document.getElementById('uploadmodal'));
        myModal.hide();
        return;
    }

}

async function sendInChunks(data, route, chunkSize = 10 ) {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let index = 0;
    // console.log('Sending chunks');
    while(index < data.length) {
        const chunk = data.slice(index, index + chunkSize);
        try {
            await fetch(route, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ transactions: chunk }) 
            });

            index += chunkSize;
            let progress = Math.round((index / data.length) * 100);
            document.getElementById("progbar").style.width = `${progress}%`;
            

        }
        catch(err) {
            return 'failed';
        }
    }
    
    
}
