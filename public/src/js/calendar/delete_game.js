const delete_game = (idGame) => {
    Swal.fire({
        title: "Supprimer un match",
        text: "Êtes-vous sûr de vouloir supprimer le match ?",
        showCloseButton: true,
        allowOutsideClick: false,
        preConfirm: async () => {
            idGame = await requestDeleteGame(idGame)
            if (idGame) {
                const toast = new HelperToast("Success")
                toast.addText("Le match à bien été supprimé !")
                toast.display()
                calendar_delete_game(idGame)
            } else {
                const toast = new HelperToast("Error")
                toast.addText("Erreur dans la suppression du match...")
                toast.display()
            }
        },
        width: "unset",
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' },
        confirmButtonText: 'Supprimer',
    });
}
