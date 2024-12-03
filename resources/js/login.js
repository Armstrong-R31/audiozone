if (window.location.pathname === '/login') {
    document.getElementById('file-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('profile-picture');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    });
}