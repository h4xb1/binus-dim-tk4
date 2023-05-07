$(function() {
    var deleteData = document.querySelectorAll('.deleteData');
    deleteData.forEach(function(element) {
        element.addEventListener('submit', function(e) {
            var c = confirm("Apakah anda yakin ingin menghapus data ini?");
            if (!c) e.preventDefault();
        });
    });
});