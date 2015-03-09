var data_table = 'pont_kategoriak';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Pontkategóriák meghatározása',
            actions: {
                listAction: 'jtable/dat_pontkategoriak.php?action=list&data_table='+data_table+'&kerdoiv='+kerdoiv,
		createAction: 'jtable/dat_pontkategoriak.php?action=create&data_table='+data_table+'&kerdoiv='+kerdoiv,
		updateAction: 'jtable/dat_pontkategoriak.php?action=update&data_table='+data_table+'&kerdoiv='+kerdoiv,
		deleteAction: 'jtable/dat_pontkategoriak.php?action=delete&data_table='+data_table+'&kerdoiv='+kerdoiv
            },
            fields: {
                id: {
                    key: true,
                    list: false
                },
		kategorianev: {
                    title: 'Kategórianév',
                    width: '60%'
                },
                tol: {
                    title: '-tól',
                    width: '20%'
                },
                ig: {
                    title: '-ig',
                    width: '20%'
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });