
    var date = new Date(); // gerando hoje para data
    var yyyy = date.getFullYear().toString();
    var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
    var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();

    $(document).ready(function() {


        $('#calendar').fullCalendar({

            header: {
                left: 'title',
             //   center: 'month,agendaWeek,agendaDay',
                right: 'prev,today,next ', //'month,agendaWeek,agendaDay'
            },


themeButtonIcons: {

    prev: 'circle-triangle-w',
    next: 'circle-triangle-e',
},

            // Mudando de idioma..
            ignoreTimezone: false,
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],


            buttonText: {
                //prev: "<",
                today: "HOJE",
                //next: ">",
                month: "Mês",
                week: "Semana",
                //day: "Dia"
            },
            // fim idiomas



            timeFormat: 'H(:mm)',
            contentHeight: 500,
            defaultDate: yyyy + "-" + mm + "-" + dd,
            //defaultDate: '2016-10-12',
            editable: false,
            eventLimit: 2, // allow "more" link when too many events
            eventLimitText: "Mais eventos",
            selectable: true,
            selectHelper: false,


            <?php if($_SESSION['logged_in'] == true) {  ?> // So adiciona evento se estiver logado

            select: function(start, end) {

                $('#ModalAdd #DATA_INICIO').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #DATA_FIM').val(moment(end).format('YYYY-MM-DD'));
                $('#ModalAdd').modal('show');
            },
             <?php } // fecha if ?>



            eventRender: function(event, element) {
                element.find('.fc-time').append(" - " + (event.end).format('H:mm')); //mostra mais detalhes
                element.find('.fc-title').append(" - " + event.lab); //mostra mais detalhes

                <?php if($_SESSION['logged_in'] == true) {  // So abre menu para editar que estiver logado.?>
                element.bind('dblclick', function() {
                    $('#ModalEdit #ID').val(event.id);
                    $('#ModalEdit #FK_USUARIO').val(event.title);
                    $('#ModalEdit #PK_MOTIVO').val(event.color);
                   // $('#ModalEdit #DATA_INICIO').val(moment(start).format('YYYY-MM-DD'));
                   // $('#ModalEdit #DATA_FIM').val(moment(end).format('YYYY-MM-DD'));
                    $('#ModalEdit').modal('show');

                    if ($('#ModalEdit #user_name').val() == $('#ModalEdit #FK_USUARIO').val()) {
                       $("#delete").show();


                    }




                });

                <?php } // fecha if ?>

            },



            events: 'http://localhost/grs/functions/eventos.php', //pega os eventos no banco de dados

            loading: function(bool) {
            if (bool)
            $('#loading').show();
            else
            $('#loading').hide();
            },

        });


    });

    //funcao para gerar efeito cascata no dropdown
    function fetch_select(val) {
        $.ajax({
            type: 'post',
            url: '../functions/fetch_data.php',
            data: {
                get_option: val
            },
            success: function(response) {
                document.getElementById("new_select").innerHTML = response;
            }
        });
    }

