const requestGetAllGames = async (start, end) => {
    const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/calendar/getAll`)
    const params = {
        start,
        end
    }
    ajax.setUrlParams(params)
    const data = await ajax.request()
    return data ? data.data : false
}

const requestAddGame = async (formData) => {
    const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/calendar/add`)
    ajax.setMethod("POST")
    ajax.setFormData(formData)
    const data = await ajax.request()
    return data ? data.data : false
}

const requestGetGame = async (id) => {
    const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/calendar/get/${id}`)
    const data = await ajax.request()
    return data ? data.data : false
}

const requestGetAllTeams = async () => {
    const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/team/getAll`)
    const data = await ajax.request()
    return data ? data.data : false
}

const requestUpdateGame = async (formData, id) => {
    const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/calendar/update/${id}`)
    ajax.setMethod("POST")
    ajax.setFormData(formData)
    const data = await ajax.request()
    return data ? data.data : false
}

const requestDeleteGame = async (id) => {
    const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/calendar/delete/${id}`)
    ajax.setMethod("DELETE")
    const data = await ajax.request()
    return data ? data.data : false
}