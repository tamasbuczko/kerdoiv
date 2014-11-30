var data_table = 'zart_emailek';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Zárt emailek karbantartása',
            actions: {
                listAction: 'jtable/dat_zartkerdoivek.php?action=list&data_table='+data_table+'&kerdoiv='+kerdoiv,
		createAction: 'jtable/dat_zartkerdoivek.php?action=create&data_table='+data_table+'&kerdoiv='+kerdoiv,
		updateAction: 'jtable/dat_zartkerdoivek.php?action=update&data_table='+data_table+'&kerdoiv='+kerdoiv,
		deleteAction: 'jtable/dat_zartkerdoivek.php?action=delete&data_table='+data_table+'&kerdoiv='+kerdoiv
            },
            fields: {
                id: {
                    key: true,
                    list: false
                },
                nev: {
                    title: 'Név',
                    width: '20%'
                },
		cegnev: {
                    title: 'Cégnév',
                    width: '20%'
                },
                email: {
                    title: 'E-mail',
                    width: '20%'
                },
                link: {
                    title: 'Link',
                    width: '20%',
                    list: false
                },
                status: {
                    title: 'Státusz',
                    width: '20%',
                    options: 'jtable/get_statuszok.php'
                },
                jelszo: {
                    title: 'Jelszó',
                    width: '20%',
                    list: false
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    