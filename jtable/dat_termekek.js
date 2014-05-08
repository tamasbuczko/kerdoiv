var data_table = 'gps_ugyfelkapu_elemek';

$(document).ready(function () {
        $('#PersonTableContainer').jtable({
            title: 'Term�kek karbantart�sa',
            actions: {
                listAction: 'jtable/dat_termekek.php?action=list&data_table='+data_table,
				createAction: 'jtable/dat_termekek.php?action=create&data_table='+data_table,
				updateAction: 'jtable/dat_termekek.php?action=update&data_table='+data_table
				//deleteAction: 'jtable/dat_felhasznalok.php?action=delete&data_table='+data_table
            },
            fields: {
                sorszam: {
                    key: true,
                    list: false
                },
                cikkszam: {
                    title: 'Cikksz�m',
                    width: '15%'
                },
                megnevezes: {
                    title: 'Megnevez�s',
                    width: '55%'
                },
                kiszereles: {
                    title: 'Kiszerel�s',
                    width: '15%'
                },
                mennyisegiegyseg: {
                    title: 'Mennyis�giegys�g',
                    width: '15%'
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    