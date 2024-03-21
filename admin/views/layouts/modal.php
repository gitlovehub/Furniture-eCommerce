<!-- The Modal -->
<div class="ios-modal-overlay" id="iosModal">
    <div class="ios-modal-wrapper">
        <div class="ios-modal-container">
            <h4 class="ios-modal-question">
                Delete item?
            </h4>
            <p class="ios-modal-text">You cannot undo this action</p>
            <div class="ios-modal-controls">
                <a id="ok-btn" class="ios-modal-control-btn">OK</a>
                <button class="ios-modal-control-btn cancel-btn" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        // Open the modal
        document.getElementById('iosModal').style.display = 'block';
        document.body.style.overflow = 'hidden';

        // Set the href attribute dynamically for the "OK" button
        document.getElementById('ok-btn').href = '?act=delete-category&id=' + id;
    }

    function confirmDelete() {
        // Redirect to delete.php using the dynamically set href
        window.location.href = document.getElementById('ok-btn').href;
    }

    function closeModal() {
        // Close the modal
        document.getElementById('iosModal').style.display = 'none';
        document.body.style.overflow = '';
    }
</script>