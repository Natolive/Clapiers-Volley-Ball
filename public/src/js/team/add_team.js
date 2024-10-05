const add_team = () => {
    let toKeepOpen = true
    const steps = ['1', '2']
    const Queue = Swal.mixin({
        progressSteps: steps,
        showCloseButton: true,
        allowOutsideClick: false,
        confirmButtonText: 'Suivant >',
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' },
    }); (async () => {
        await Queue.fire({
            currentProgressStep: 0,
            didOpen: didOpenStep1,
            preConfirm: preConfirmStep1,
            html: $("#template-add-team").find("#step-1").clone().show().removeAttr("id"),
        }).then((result) => {
            if (result.isDismissed) {
                toKeepOpen = false
            }
        })
        if (toKeepOpen) {
            await Queue.fire({
                currentProgressStep: 1,
                didOpen: didOpenStep2,
                preConfirm: preConfirmStep2,
                html: $("#template-add-team").find("#step-2").clone().show().removeAttr("id"),
                confirmButtonText: 'Ajouter',
            })
        }
    })()
}

const didOpenStep1 = () => {
    const $modal = $(Swal.getHtmlContainer())
    

    M.CharacterCounter.init($modal.find("input#input-name")[0])
    M.CharacterCounter.init($modal.find("input#input-division")[0])
    M.CharacterCounter.init($modal.find("textarea#input-description")[0])


}
const preConfirmStep1 = () => {}

const didOpenStep2 = () => {}
const preConfirmStep2 = () => {}