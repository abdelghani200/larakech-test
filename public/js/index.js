
$(document).ready(function () {
    $('.edit-modal-trigger').on('click', function () {
        var contactId = $(this).data('id');
        $.ajax({
            url: '/contacts/' + contactId + '/edit',
            method: 'GET',
            success: function (data) {
                $('#edit-modal-body').html(data);
                $('#edit-modal').removeClass('hidden');
            }
        });
    });
});

function closeModalEdit() {
    $('#edit-modal').addClass('hidden');
}


$(document).ready(function () {
    $('.show-modal-trigger').on('click', function () {
        var contactId = $(this).data('id');
        $.ajax({
            url: '/contacts/' + contactId,
            method: 'GET',
            success: function (data) {
                $('#show-modal-body').html(data);
                $('#show-modal').removeClass('hidden');
            }
        });
    });
});

$(document).ready(function () {
    $('.create-modal-trigger').on('click', function () {
        $.ajax({
            url: '/contacts/create',
            method: 'GET',
            success: function (data) {
                $('#create-modal-body').html(data);
                $('#create-modal').removeClass('hidden');
            }
        });
    });


});

function closeCreateModal() {
    $('#create-modal').addClass('hidden');
}


function closeModal() {
    $('#show-modal').addClass('hidden');
}



function closeModalDouble() {
    $('#cancel-button').addClass('hidden');
}



function confirmDelete(contactId) {
    document.getElementById('delete-modal').classList.remove('hidden');
    document.getElementById('delete-modal').classList.add('visible');

    document.getElementById('confirm-button').addEventListener('click', function () {
        document.getElementById('delete-form-' + contactId).submit();
    });

    document.getElementById('cancel-button').addEventListener('click', function () {
        document.getElementById('delete-modal').classList.remove('visible');
        document.getElementById('delete-modal').classList.add('hidden');
    });
}

$(document).ready(function () {
    $('#delete-button').on('click', function () {
        confirmDelete(1);
    });
});







document.addEventListener('DOMContentLoaded', function () {
    if (duplicateContactError) {
        document.getElementById('confirm-duplicate-modal').classList.remove('hidden');

        document.getElementById('duplicate-confirm-button').addEventListener('click', function () {
            const form = document.getElementById('duplicate-contact-form');
            if (form) {
                form.submit();
            } else {
                console.error('Formulaire introuvable');
            }
        });

        document.getElementById('duplicate-cancel-button').addEventListener('click', function () {
            document.getElementById('confirm-duplicate-modal').classList.add('hidden');
        });
    }
});

