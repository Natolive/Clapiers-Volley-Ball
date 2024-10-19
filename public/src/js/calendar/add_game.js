const add_game = async (info) => {
    const date = info.date
    const formData = new FormData()

    const teams = await requestGetAllTeams()
    if (teams.length === 0) {
        const toast = new HelperToast("Error")
        toast.addText("Aucune équipe, ajoutez en une avant d'ajouter un match !")
        toast.display()
    } else {
        if (teams) {
            const didOpenStep1 = () => {
                const $modal = $(Swal.getHtmlContainer())

                const $teams = $modal.find("#input-teams")
                teams.forEach(team => {
                    $teams.append($("<option>").val(team.id).text(team.name).attr("data-icon",
                        team.image_uuid ?
                            `${GlobalVariables.baseUrl}backend/http/serve/get/${team.image_uuid}.${team.image_extension}`
                            : `${GlobalVariables.baseUrl}src/images/f1c2343b-5928-422b-bea8-50c5582be632.webp`))
                });
                M.FormSelect.init($teams[0], []);
                M.CharacterCounter.init($modal.find("input#input-opposite-team")[0])
            }
            const preConfirmStep1 = () => {
                const valid = []

                const $modal = $(Swal.getHtmlContainer())

                const $teams = $modal.find("#input-teams")
                const $oppositeTeam = $modal.find("input#input-opposite-team")

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

                if (valid.includes(false)) {
                    return false
                }

                formData.append("id_team", $teams.val())
                formData.append("opposite_team", $oppositeTeam.val())
            }

            const didOpenStep2 = () => {
                const $modal = $(Swal.getHtmlContainer())

                const $gamesPlacesTypes = $modal.find("#input-games-places-types")
                const $gamesChampionshipsTypes = $modal.find("#input-games-championships-types")
                M.FormSelect.init($gamesPlacesTypes[0], []);
                M.FormSelect.init($gamesChampionshipsTypes[0], []);

                const $date = $modal.find("#input-date")
                M.Datepicker.init($date[0], {
                    defaultDate: date,
                    setDefaultDate: true,
                    format: "dd/mm/yyyy"
                });
            }
            const preConfirmStep2 = async () => {
                const valid = []

                const $modal = $(Swal.getHtmlContainer())

                const $gamesPlacesTypes = $modal.find("#input-games-places-types")
                const $gamesChampionshipsTypes = $modal.find("#input-games-championships-types")
                const $date = $modal.find("input#input-date")

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

                if (!validator.isDate($date.val(), { format: "dd/mm/yyyy" })) {
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

                const game = await requestAddGame(formData)
                if (game) {
                    const toast = new HelperToast("Success")
                    toast.addText("Le match à bien été ajouté !")
                    toast.display()
                    calendar_add_game(game)
                } else {
                    const toast = new HelperToast("Error")
                    toast.addText("Erreur dans l'ajout du match...")
                    toast.display()
                }
            }

            // MODAL

            let toKeepOpen = true
            const steps = ['1', '2']
            const Queue = Swal.mixin({
                title: "Ajouter un match",
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
                    html: $("#template-add-game").find("#step-1").clone().show().removeAttr("id"),
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
                        html: $("#template-add-game").find("#step-2").clone().show().removeAttr("id"),
                        confirmButtonText: 'Ajouter',
                    })
                }
            })()
        }
    }
}