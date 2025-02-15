
let table = document.getElementById("Medicines")
let Rows = table.getElementsByTagName('tr')
const Search = () => {
    let searchfield = document.getElementById("Search")
    let s = searchfield.value.toLowerCase();
    for (let i = 1; i < Rows.length; i++) { // Start from index 1 to skip the header row
        let data = Rows[i];
        let Names = data.getElementsByTagName('td')
        let found = false;
        for (let text of Names) {
            let value_of_cell = text.textContent.toLowerCase();
            if (value_of_cell.indexOf(s) > -1) {
                found = true;
                break;
            }
        }
        if (found) {
            data.style.display = "";
        } else {
            data.style.display = "none";
        }
    }
}
function Cart() {
    location.href = "Cart.php"
}


function AddIntoRecord(id, username)
{
    id = Number.parseInt(id);
    formElement.action = "User_Purchased.php?user=username&medicineid=id";
    formElement.submit();
}