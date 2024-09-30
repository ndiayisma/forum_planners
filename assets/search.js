console.log("Asset Mapper c\'est trop bien ! ");

//search user from input (id=search) and filter rows from table bod (id=userTable)

document.getElementById('search').addEventListener('keyup', function() {
    var input = document.getElementById('search').value;
    var table = document.getElementById('userTable');
    var tr = table.getElementsByTagName('tr');
    for (var i = 0; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName('td')[0];
        if (td) {
            var textValue = td.textContent || td.innerText;
            if (textValue.indexOf(input) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}