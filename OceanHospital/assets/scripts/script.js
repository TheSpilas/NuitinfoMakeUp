document.getElementById('menuButton').addEventListener('click', function() {
    document.getElementById('sidebar').classList.add('active');
});

document.getElementById('closeSidebar').addEventListener('click', function() {
    document.getElementById('sidebar').classList.remove('active');
});