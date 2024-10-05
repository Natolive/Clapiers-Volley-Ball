const build_card_team = async () => {

    const teams = await request()
    if (teams) {
        teams.forEach(team => {
            const $cardTeam = $("#template-card-team").clone().show().removeAttr("id")
            const $subTitle = $("<span>").css({"font-size": "18px", "font-weight": "200"}).text(team.division)
            $cardTeam.find(".card-title").text(team.name)
            $cardTeam.find(".card-title").append($("<br>"))
            $cardTeam.find(".card-title").append($subTitle)
            $cardTeam.find(".card-content p").text(team.description ?? "Aucune description")
            $("#teams").append($cardTeam)
        });
    }
    
}

const request = async () => {
    const ajax = new HelperAjax(`${GlobalVariables.baseUrl}backend/http/team/getAll`)
    const data = await ajax.request()
    return data ? data.data : false
}