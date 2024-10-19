const delete_game = (idGame) => {
    Swal.fire({
        title: "Supprimer un match",
        text: "Êtes-vous sûr de vouloir supprimer le match ?",
        showCloseButton: true,
        allowOutsideClick: false,
        preConfirm: async () => {
            idGame = await requestDeleteGame(idGame)
            if (idGame) {
                calendar_delete_game(idGame)
            }
        },
        width: "unset",
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' },
        confirmButtonText: 'Supprimer',
    });
}
