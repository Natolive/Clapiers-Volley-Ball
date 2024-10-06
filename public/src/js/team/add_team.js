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
        const valid = []

        const $modal = $(Swal.getHtmlContainer())

        const $name = $modal.find("input#input-name")
        const $division = $modal.find("input#input-division")
        const $description = $modal.find("textarea#input-description")

        if (!validator.isLength($name.val(), { min: 1, max: 100 })) {
            valid.push(false)
            $name.removeClass("valid").addClass('invalid')
        } else {
            $name.removeClass("invalid").addClass('valid')
        }
        
        if (!validator.isLength($division.val(), { min: 1, max: 100 })) {
            valid.push(false)
            $division.removeClass("valid").addClass('invalid')
        } else {
            $division.removeClass("invalid").addClass('valid')
        }
        
        if ($description.val().length > 0) {
            if (!validator.isLength($description.val(), { min: 1, max: 200 })) {
                valid.push(false)
                $description.removeClass("valid").addClass('invalid')
            } else {
                $description.removeClass("invalid").addClass('valid')
                formData.append("description", $description.val())
            }
        }

        if (valid.includes(false)) {
            return false
        }
        
        formData.append("name", $name.val())
        formData.append("division", $division.val())
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
            height: "60vh",
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
        title: "Ajouter une équipe",
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
