const delete_team = async (idTeam) => {
    Swal.fire({
        title: "Supprimer une équipe",
        text: "Êtes-vous sûr de vouloir supprimer l'équipe ?",
        showCloseButton: true,
        allowOutsideClick: false,
        preConfirm: async () => {
            const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/team/delete/${idTeam}`)
            ajax.setMethod("DELETE")
            const result = await ajax.request() ? true : false
            if (result) {
                const toast = new HelperToast("Success")
                toast.addText("L'équipe à bien été supprimé !")
                toast.display()
                build_cards_teams()
            } else {
                const toast = new HelperToast("Error")
                toast.addText("Erreur dans la suppression de l'équipe...")
                toast.display()
            }
            return result
        },
        width: "unset",
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' },
        confirmButtonText: 'Supprimer',
    });
}