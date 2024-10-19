const update_game = async (info) => {
    const idGame = info.event.id

    const game = await requestGetGame(idGame)
    const date = new Date(game.date.date)

    const didOpen = async () => {
        const $modal = $(Swal.getHtmlContainer())
        const teams = await requestGetAllTeams()

        const $teams = $modal.find("#input-teams")
        const $oppositeTeam = $modal.find("#input-opposite-team")
        const $gamesPlacesTypes = $modal.find("#input-games-places-types")
        const $gamesChampionshipsTypes = $modal.find("#input-games-championships-types")
        const $date = $modal.find("#input-date")

        M.CharacterCounter.init($modal.find("input#input-opposite-team")[0])

        $teams.val(game.id_team.id)
        $oppositeTeam.val(game.opposite_team).click()
        $gamesPlacesTypes.val(game.id_game_place_type.id)
        $gamesChampionshipsTypes.val(game.id_game_championship_type.id)
        
        teams.forEach(team => {
            $teams.append($("<option>").val(team.id).text(team.name).attr("data-icon", 
                team.image_uuid ? 
                `${GlobalVariables.baseUrl}backend/http/serve/get/${team.image_uuid}.${team.image_extension}`
                : `${GlobalVariables.baseUrl}src/images/f1c2343b-5928-422b-bea8-50c5582be632.webp`))
        });
        M.FormSelect.init($teams[0], []);
        M.FormSelect.init($gamesPlacesTypes[0], []);
        M.FormSelect.init($gamesChampionshipsTypes[0], []);
        M.Datepicker.init($date[0], {
            defaultDate: date,
            setDefaultDate: true,
            format: "dd/mm/yyyy"
        });
    }
    const preConfirm = async () => {
        const valid = []
        const formData = new FormData()
        const $modal = $(Swal.getHtmlContainer())

        const $teams = $modal.find("#input-teams")
        const $oppositeTeam = $modal.find("#input-opposite-team")
        const $gamesPlacesTypes = $modal.find("#input-games-places-types")
        const $gamesChampionshipsTypes = $modal.find("#input-games-championships-types")
        const $date = $modal.find("#input-date")

        if ($teams.val() === null) {
            valid.push(false)
            $teams.removeClass("valid").addClass('invalid')
        } else {
            $teams.removeClass("invalid").addClass('valid')
        }

        if (!validator.isLength($oppositeTeam.val(), { min: 1, max: 255 })) {
            valid.push(false)
            $oppositeTeam.removeClass("valid").addClass('invalid')
        } else {
            $oppositeTeam.removeClass("invalid").addClass('valid')
        }

        if ($gamesPlacesTypes.val() === null) {
            valid.push(false)
            $gamesPlacesTypes.removeClass("valid").addClass('invalid')
        } else {
            $gamesPlacesTypes.removeClass("invalid").addClass('valid')
        }

        if ($gamesChampionshipsTypes.val() === null) {
            valid.push(false)
            $gamesChampionshipsTypes.removeClass("valid").addClass('invalid')
        } else {
            $gamesChampionshipsTypes.removeClass("invalid").addClass('valid')
        }

        if (!validator.isDate($date.val(), { format: "dd/mm/yyyy"})) {
            valid.push(false)
            $date.removeClass("valid").addClass('invalid')
        } else {
            $date.removeClass("invalid").addClass('valid')
        }

        if (valid.includes(false)) {
            return false
        }
        
        formData.append("id_game_place_type", $gamesPlacesTypes.val())
        formData.append("id_game_championship_type", $gamesChampionshipsTypes.val())
        formData.append("date", $date.val())
        formData.append("id_team", $teams.val())
        formData.append("opposite_team", $oppositeTeam.val())

        const game = await requestUpdateGame(formData, idGame)
        if (game) {
            const toast = new HelperToast("Success")
            toast.addText("Le match à bien été modifié !")
            toast.display()
            calendar_update_game(game)
        } else {
            const toast = new HelperToast("Error")
            toast.addText("Erreur dans la modification du match...")
            toast.display()
        }
    }

    Swal.fire({
        title: "Modifier un match",
        html: $("#template-update-game").clone().show().removeAttr("id")[0],
        showCloseButton: true,
        allowOutsideClick: false,
        width: "unset",
        didOpen,
        preConfirm,
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' },
        confirmButtonText: 'Modifier',
    });
}