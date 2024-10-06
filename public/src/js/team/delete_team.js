const delete_team = async () => {

    const request = async () => {
        const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/team/getAll`)
        const data = await ajax.request()
        return data ? data.data : false
    }
    const teams = await request()
 
    const didOpen = () => {
        const $modal = $(Swal.getHtmlContainer())
        $modal.css("height", "60vh")
        const $select = $modal.find("select")

        teams.forEach(team => {
            $select.append($("<option>").val(team.id).text(team.name))
        });

        M.FormSelect.init($select[0], []);
    }
    const preConfirm = async () => {
        const $modal = $(Swal.getHtmlContainer())
        const value = $modal.find("select").val()

        if (!validator.isInt(value, { min: 1 })) {
            return false
        }

        const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/team/delete/${value}`)
        ajax.setMethod("DELETE")
        return await ajax.request() ? true : false
    }

    Swal.fire({
        title: "Supprimer une équipe",
        didOpen: didOpen,
        preConfirm: preConfirm,
        html: $("#template-delete-team").clone().show().removeAttr("id").css("display", "flex"),
        allowOutsideClick: false,
        showCloseButton: true,
        confirmButtonText: 'Supprimer',
    });
}