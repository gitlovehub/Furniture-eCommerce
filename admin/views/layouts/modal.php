<!-- The Modal -->
<div class="ios-modal-overlay" id="iosModal">
    <div class="ios-modal-wrapper">
        <div class="ios-modal-container">
            <h4 id="question" class="ios-modal-question"></h4>
            <p id="message" class="ios-modal-text"></p>
            <div class="ios-modal-controls">
                <a id="ok-btn" class="ios-modal-control-btn">OK</a>
                <button class="ios-modal-control-btn cancel-btn" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModalDelete(id, url) {
        document.body.style.overflow = 'hidden';
        document.getElementById('question').innerHTML = 'Delete item?';
        document.getElementById('message').innerHTML  = 'You cannot undo this action.';
        // Open the modal
        document.getElementById('iosModal').style.display = 'block';

        // Set the href attribute dynamically for the "OK" button
        document.getElementById('ok-btn').href = '?act=' + url + '&id=' + id;
    }

    function openModalUpdateStatus(id, value, table, question, message) {
        document.body.style.overflow = 'hidden';
        document.getElementById('question').innerHTML = question;
        document.getElementById('message').innerHTML  = message;
        // Open the modal
        document.getElementById('iosModal').style.display = 'block';

        // Set the href attribute dynamically for the "OK" button
        document.getElementById('ok-btn').href = '?act=update-status-' + table + '&id=' + id + '&value=' + value;
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