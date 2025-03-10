
async function hashDetails(details) {
    const encoder = new TextEncoder();
    const data = encoder.encode(details);
    const hashBuffer = await crypto.subtle.digest("SHA-256", data);
    return Array.from(new Uint8Array(hashBuffer))
        .map(b => b.toString(16).padStart(2, '0'))
        .join('');
}


async function handleFile(route) {
    const input = document.getElementById("file");
    const userid = document.querySelector('meta[name="user_id"]').getAttribute('content');
    if (!input.files.length) {
        alert("Please select a file");
        return;
    }

    const file = input.files[0];
    const reader = new FileReader();
    const transactions = [];
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
                if(splits[1].match(/(\d{2}\/\d{2}\/\d{2})/) && splits[2].match(/(\d{2}\/\d{2}\/\d{2})/)) {
                    // console.log(splits);
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
                    transactions.push({ upi_rrn: upi_rrn, ammount: ammount, iscredit: iscredit, upload_by: userid });
                }
            }

            
        }
        console.log(transactions);


        sendInChunks(transactions, route);
    };

    reader.readAsText(file);
    
}

async function sendInChunks(data, route, chunkSize = 10 ) {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let index = 0;
    console.log('Sending chunks');
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

            if(progress >= 100) {
                let myModal = bootstrap.Modal.getInstance(document.getElementById('uploadmodal'));
                myModal.hide();
                alert(`Upload completed! ${data.length} transactions uploaded`);
            }
            
        }
        catch(err) {
            console.error("Upload failed", err);
            break;
        }
    }
    
    
}
