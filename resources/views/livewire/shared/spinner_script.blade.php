<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('spinner').addEventListener('click', function () {
            var spinner = this.querySelector('.spinner-border');
            spinner.classList.remove('d-none'); // Show spinner
            // Perform login action here
            // Once login action is complete, hide the spinner
            setTimeout(function () {
                spinner.classList.add('d-none'); // Hide spinner
            }, 2000); // Simulating a 2-second delay for demonstration
        });
    });
</script>
