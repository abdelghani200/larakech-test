
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

function confirmDelete(contactId) {
    Swal.fire({
        title: '<i class="fa fa-exclamation-triangle text-red-600"></i> Supprimer le contact',
        html: '<p>Etes-vous sûr de vouloir supprimer le contact ?<br>Cette opération est irréversible.</p>',
        showCancelButton: false,
        showConfirmButton: false,
        footer: '<div class="bg-green-100 flex justify-end p-2 -mx-4 -mb-6 space-x-2">' +
            '<button id="cancel-button" class="border border-gray-300 rounded-md bg-white-500 text-black py-2 px-4" onclick="closeModalEdit()">Annuler</button>' +
            '<button id="confirm-button" class="border border-gray-300 rounded-md bg-red-400 text-white py-2 px-4" style="margin-right:67px;">Confirmer</button>' +
            '</div>',
        customClass: {
            title: 'flex',
        }

    });
    document.getElementById('confirm-button').addEventListener('click', function () {
        document.getElementById('delete-form-' + contactId).submit();
    });
    document.getElementById('cancel-button').addEventListener('click', function () {
        Swal.close();
    });
}

$(document).ready(function () {
    $('#delete-button').on('click', function () {
        confirmDelete(1);
    });
});










document.addEventListener('DOMContentLoaded', function () {
    if (duplicateContactError) {
        Swal.fire({
            title: '<i class="fa fa-exclamation-triangle text-red-600"></i> Doublon',
            html: '<p>' + duplicateContactMessage + '</p>',
            showCancelButton: false,
            showConfirmButton: false,
            footer: '<div class="bg-green-100 flex justify-end p-2 -mx-4 -mb-6 space-x-2">' +
                '<button id="confirm-button" class="border border-gray-300 rounded-md bg-red-400 text-white py-2 px-4">Confirmer</button>' +
                '</div>',
            customClass: {
                title: 'flex',
            }
        });

        document.getElementById('confirm-button').addEventListener('click', function () {
            const form = document.getElementById('duplicate-contact-form');
            if (form) {
                form.submit();
            } else {
                console.error('Formulaire introuvable');
            }
        });
    }
});
