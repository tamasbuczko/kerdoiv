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
                osszpontszam: {
                    title: 'összpontszám',
                    width: '20%',
                    edit: false,
                    list: false
                },
                pontkategoria: {
                    title: 'kategória',
                    width: '20%',
                    edit: false
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
                },
                szov_ertekeles: {
                    title: 'Szöveges értékelés',
                    type: 'textarea',
                    list: false
                },
                szov_ertekeles_ikon: {
                    title: '',
                    edit: false,
                    display: function (data) {
                        if (data.record.szov_ertekeles){
                            var $link2 = $('<img src="graphics/icon_graph_k.png" alt="" title="szöveges értékelés készült" />');
                            $link2.click(function(){ /* do something on click */ });
                            return $link2;
                        }
                    }
                },
                eredmeny: {
                    title: '',
                    edit: false,
                    display: function (data) {
                        if (data.record.kitolto_sorszam){
                            var $link = $('<a href="?p=kerdoiv&kerdoiv='+data.record.kerdoiv+'&er=1&kitolto='+data.record.kitolto_sorszam+'" title="Eredmény"><img src="graphics/icon_graph_k.png" alt="" /></a>');
                            $link.click(function(){ /* do something on click */ });
                            return $link;
                        }
                    }
                }
            }
        });
        $('#PersonTableContainer').jtable('load');
    });
    
    