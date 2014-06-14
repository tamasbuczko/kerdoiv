var data_table = 'sugo';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Súgó karbantartása',
            actions: {
                listAction: 'jtable/dat_sugo.php?action=list&data_table='+data_table,
				createAction: 'jtable/dat_sugo.php?action=create&data_table='+data_table,
				updateAction: 'jtable/dat_sugo.php?action=update&data_table='+data_table,
				deleteAction: 'jtable/dat_sugo.php?action=delete&data_table='+data_table
            },
            fields: {
                id: {
                    key: true,
                    list: true,
					title: 'id',
					width: '5%'
                },
                hu: {
                    title: 'hu',
                    width: '29%'
                },
				en: {
                    title: 'en',
                    width: '29%'
                },
				de: {
                    title: 'de',
                    width: '29%'
                },
				megjegyzes: {
                    title: 'megjegyzés',
                    width: '13%'
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    