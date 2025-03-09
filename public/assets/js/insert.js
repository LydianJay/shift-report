
function handleFile(route) {
    const input = document.getElementById("file");
    

    if (!input.files.length) {
        alert("Please select a file");
        return;
    }

    const file = input.files[0];
    const reader = new FileReader();
    const transactions = [];
    console.log(route);
    reader.onload = function (event) {
        const lines = event.target.result.split("\n");
        let upiRrn = null;

        lines.forEach((line) => {
            const upiMatch = line.match(/UPI\/RRN\s+(\d+)/);
            if (upiMatch) {
                upiRrn = upiMatch[1];
            }

            const creditMatch = line.match(/BY TRF\.\s+([\d,]+\.\d{2})/);
            if (creditMatch && upiRrn) {
                const creditAmount = creditMatch[1].replace(/,/g, ""); // Remove commas
                transactions.push({ upi_rrn: upiRrn, amount: parseFloat(creditAmount) });
                upiRrn = null; // Reset for the next transaction
            }
        });

        console.log(transactions.length);
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
