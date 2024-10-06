const build_card_team = async () => {

    const teams = await request()
    if (teams) {
        teams.forEach(team => {
            const $cardTeam = $("#template-card-team").clone().show().removeAttr("id")
            const $subTitle = $("<span>").css({"font-size": "18px", "font-weight": "200"}).text(team.division)
            $cardTeam.find(".card-title").text(team.name)
            $cardTeam.find(".card-title").append($("<br>"))
            $cardTeam.find(".card-title").append($subTitle)

            $cardTeam.find(".card-image img").attr("src", 
                team.image_uuid ? 
                `${GlobalVariables.baseUrl}backend/http/serve/get/${team.image_uuid}.${team.image_extension}`
                : `${GlobalVariables.baseUrl}src/images/f1c2343b-5928-422b-bea8-50c5582be632.avif`
            )
            
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