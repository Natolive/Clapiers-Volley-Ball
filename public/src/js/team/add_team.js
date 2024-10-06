const add_team = () => {
    const formData = new FormData()
    
    // CALLBACKS
    
    const didOpenStep1 = () => {
        const $modal = $(Swal.getHtmlContainer())
        M.CharacterCounter.init($modal.find("input#input-name")[0])
        M.CharacterCounter.init($modal.find("input#input-division")[0])
        M.CharacterCounter.init($modal.find("textarea#input-description")[0])
    }
    const preConfirmStep1 = () => {
        const $modal = $(Swal.getHtmlContainer())

        const name = $modal.find("input#input-name").val()
        const division = $modal.find("input#input-division").val()
        const description = $modal.find("textarea#input-description").val()

        formData.append("name", name)
        formData.append("division", division)
        formData.append("description", description)
    }

    const didOpenStep2 = () => {
        const $modal = $(Swal.getHtmlContainer())

        const uppy = new Uppy.Uppy({
            allowMultipleUploadBatches: false,
            restrictions: {
                maxNumberOfFiles: 1,
                maxFileSize: 2 * 1024 * 1024,
                allowedFileTypes: ['image/*']
            }
        }).use(Uppy.Dashboard, {
            inline: true,
            singleFileFullScreen: true,
            note: "Importez une image d'équipe",
            target: $modal.find("#input-image")[0],
            height: "70vh",
            autoOpenFileEditor: true,
            hideUploadButton: true,
        }).use(Uppy.ImageEditor, {
            target: Uppy.Dashboard,
            quality: 0.8,
            cropperOptions: {
                viewMode: 0,
                background: true,
                autoCropArea: 1,
            },
            actions: {
                revert: true,
                rotate: true,
                granularRotate: false,
                flip: true,
                zoomIn: true,
                zoomOut: true,
                cropSquare: true,
                cropWidescreen: true,
                cropWidescreenVertical: true,
            }
        })
        $modal.find("#input-image").data("uppy", uppy)
    }
    const preConfirmStep2 = async () => {
        const $modal = $(Swal.getHtmlContainer())

        const uppy = $modal.find("#input-image").data("uppy")

        const files = uppy.getFiles()
        if (files.length === 1) {
            formData.append('image', files[0].data, files[0].name)
        }

        const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/team/add`)
        ajax.setMethod("POST")
        ajax.setFormData(formData)
        return await ajax.request() ? true : false
    }
    
    // MODAL
    
    let toKeepOpen = true
    const steps = ['1', '2']
    const Queue = Swal.mixin({
        progressSteps: steps,
        showCloseButton: true,
        allowOutsideClick: false,
        width: "unset",
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
