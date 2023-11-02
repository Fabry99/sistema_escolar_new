$(document).ready(function () {
    var table = $('#dataTableProfe').DataTable({
        lengthMenu: [5, 10, 15, 25],
        scrollX: true,
        scrollY: 180,
        responsive: true,
        autoWidth: true,
        autoFill: true,
        order: [[0, 'desc']],
        buttons: [
        {
            text: "<i class='fa-solid fa-file-pdf'></i>",
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger btn-lg ',
            extend: 'pdfHtml5',
            title: 'Centro Escolar Santa Teresita',
            exportOptions: {
                columns: [1, 2, 3, 5, 6, 7]
            },
            customize: function (doc) {
                var table = doc.content[1].table;
                for (var i = 0; i < table.body.length; i++) {
                    var row = table.body[i];
                    for (var j = 0; j < row.length; j++) {
                        var cell = row[j];
                        if (cell.text === "Activo") {
                            cell.text = { text: "Activo", color: 'white', fontSize: 12};
                            cell.fillColor = '#57D386';
                        } else if (cell.text === "Inactivo") {
                            cell.text = { text: "Inactivo", color: 'white',fontSize: 12 };
                            cell.fillColor = '#B9B9B9';
                        }   
                    }
                }
                doc.content[0].margin = [50, 0, 50, 30];
                doc.styles.title = {
                    margin: [0, 50, 0, 0],
                    color: 'black',
                    fontSize: '32',
                    alignment: 'center',

                }
                doc.styles['td:nth-child(2)'] = {
                    width: '100px',
                    'max-width': '100px'
                }
                doc.styles.tableHeader = {

                    fillColor: '#0F72E2',
                    color: 'white'
                }
                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                doc.styles.tableHeader.alignment = 'center';
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyOdd.alignment = 'center';
            },

            orientation: 'landscape'
        }
        ],
        language: {
            "aria": {
                "sortAscending": "Activar para ordenar la columna de manera ascendente",
                "sortDescending": "Activar para ordenar la columna de manera descendente"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmente"
            },
            "buttons": {
                "collection": "Colección",
                "colvis": "Visibilidad",
                "colvisRestore": "Restaurar visibilidad",
                "copy": "Copiar",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "createState": "Crear Estado",
                "removeAllStates": "Borrar Todos los Estados",
                "removeState": "Borrar Estado",
                "renameState": "Renombrar Estado",
                "savedStates": "Guardar Estado",
                "stateRestore": "Restaurar Estado",
                "updateState": "Actualizar Estado"
            },
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor",
                "conditions": {
                    "date": {
                        "after": "Después",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina con",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "startsWith": "Inicia con",
                        "notEmpty": "No vacío",
                        "notContains": "No Contiene",
                        "notEndsWith": "No Termina",
                        "notStartsWith": "No Comienza"
                    },
                    "array": {
                        "equals": "Igual a",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "not": "Diferente",
                        "notEmpty": "No vacío",
                        "without": "Sin"
                    }
                },
                "data": "Datos"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "countFiltered": "{shown} ({total})",
                "collapseMessage": "Colapsar",
                "showMessage": "Mostrar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ",",
            "datetime": {
                "previous": "Anterior",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "am",
                    "pm"
                ],
                "next": "Siguiente",
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
                }
            },
            "decimal": ".",
            "emptyTable": "No hay datos disponibles en la tabla",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "stateRestore": {
                "removeTitle": "Eliminar",
                "creationModal": {
                    "search": "Buscar",
                    "button": "Crear",
                    "columns": {
                        "search": "Columna de búsqueda",
                        "visible": "Columna de visibilidad"
                    },
                    "name": "Nombre:",
                    "order": "Ordenar",
                    "paging": "Paginar",
                    "scroller": "Posición de desplazamiento",
                    "searchBuilder": "Creador de búsquedas",
                    "select": "Selector",
                    "title": "Crear nuevo",
                    "toggleLabel": "Incluye:"
                },
                "duplicateError": "Ya existe un valor con el mismo nombre",
                "emptyError": "No puede ser vacío",
                "emptyStates": "No se han guardado",
                "removeConfirm": "Esta seguro de eliminar %s?",
                "removeError": "Fallo al eliminar",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Renombrar",
                "renameLabel": "Nuevo nombre para %s:",
                "renameTitle": "Renombrar"
            },
            "infoEmpty": "No hay datos para mostrar"
        }
    });

    table.buttons().container()
        .appendTo('#dataTableProfe_wrapper .col-md-6:eq(0)');
});



$(document).ready(function () {
    var table = $('#dataTableAlumno').DataTable({
        lengthMenu: [5, 10, 15, 25],
        scrollX: true,
        scrollY: 180,
        responsive: true,
        autoWidth: true,
        autoFill: true,
        order: [[1, 'desc']],
        buttons: [
        {
            text: "<i class='fa-solid fa-file-pdf'></i>",
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger btn-lg',
            extend: 'pdfHtml5',
            title: 'Centro Escolar Santa Teresita',
            exportOptions: {
                columns: [0, 1, 3, 4, 5, 6]
            },
            customize: function (doc) {
                doc.content[0].margin = [50, 0, 50, 30];
                doc.styles.title = {
                    margin: [0, 50, 0, 0],
                    color: 'black',
                    fontSize: '32',
                    alignment: 'center',

                }
                doc.styles['td:nth-child(2)'] = {
                    width: '100px',
                    'max-width': '100px'
                }
                doc.styles.tableHeader = {

                    fillColor: '#0F72E2',
                    color: 'white'
                }
                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                doc.styles.tableHeader.alignment = 'center';
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyOdd.alignment = 'center';
            },

            orientation: 'landscape'
        }
        ],
        language: {
            "aria": {
                "sortAscending": "Activar para ordenar la columna de manera ascendente",
                "sortDescending": "Activar para ordenar la columna de manera descendente"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmente"
            },
            "buttons": {
                "collection": "Colección",
                "colvis": "Visibilidad",
                "colvisRestore": "Restaurar visibilidad",
                "copy": "Copiar",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "createState": "Crear Estado",
                "removeAllStates": "Borrar Todos los Estados",
                "removeState": "Borrar Estado",
                "renameState": "Renombrar Estado",
                "savedStates": "Guardar Estado",
                "stateRestore": "Restaurar Estado",
                "updateState": "Actualizar Estado"
            },
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor",
                "conditions": {
                    "date": {
                        "after": "Después",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina con",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "startsWith": "Inicia con",
                        "notEmpty": "No vacío",
                        "notContains": "No Contiene",
                        "notEndsWith": "No Termina",
                        "notStartsWith": "No Comienza"
                    },
                    "array": {
                        "equals": "Igual a",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "not": "Diferente",
                        "notEmpty": "No vacío",
                        "without": "Sin"
                    }
                },
                "data": "Datos"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "countFiltered": "{shown} ({total})",
                "collapseMessage": "Colapsar",
                "showMessage": "Mostrar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ",",
            "datetime": {
                "previous": "Anterior",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "am",
                    "pm"
                ],
                "next": "Siguiente",
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
                }
            },
            "decimal": ".",
            "emptyTable": "No hay datos disponibles en la tabla",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "stateRestore": {
                "removeTitle": "Eliminar",
                "creationModal": {
                    "search": "Buscar",
                    "button": "Crear",
                    "columns": {
                        "search": "Columna de búsqueda",
                        "visible": "Columna de visibilidad"
                    },
                    "name": "Nombre:",
                    "order": "Ordenar",
                    "paging": "Paginar",
                    "scroller": "Posición de desplazamiento",
                    "searchBuilder": "Creador de búsquedas",
                    "select": "Selector",
                    "title": "Crear nuevo",
                    "toggleLabel": "Incluye:"
                },
                "duplicateError": "Ya existe un valor con el mismo nombre",
                "emptyError": "No puede ser vacío",
                "emptyStates": "No se han guardado",
                "removeConfirm": "Esta seguro de eliminar %s?",
                "removeError": "Fallo al eliminar",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Renombrar",
                "renameLabel": "Nuevo nombre para %s:",
                "renameTitle": "Renombrar"
            },
            "infoEmpty": "No hay datos para mostrar"
        }
    });
    
    table.buttons().container()
        .appendTo('#dataTableAlumno_wrapper .col-md-6:eq(0)');

});

$(document).ready(function () {
    var table = $('#dataTableGrados').DataTable({
        lengthMenu: [5, 10, 15, 25],
        scrollX: true,
        scrollY: 180,
        responsive: true,
        autoWidth: true,
        autoFill: true,
        order: [[1, 'desc']],
        buttons: [
        {
            text: "<i class='fa-solid fa-file-pdf'></i>",
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger btn-lg ',
            extend: 'pdfHtml5',
            title: 'Centro Escolar Santa Teresita',
            exportOptions: {
                columns: [1, 2, 3, 5, 6, 7]
            },
            customize: function (doc) {
                var table = doc.content[1].table;
                for (var i = 0; i < table.body.length; i++) {
                    var row = table.body[i];
                    for (var j = 0; j < row.length; j++) {
                        var cell = row[j];
                        if (cell.text === "Activo") {
                            cell.text = { text: "Activo", color: 'white', fontSize: 12};
                            cell.fillColor = '#57D386';
                        } else if (cell.text === "Inactivo") {
                            cell.text = { text: "Inactivo", color: 'white',fontSize: 12 };
                            cell.fillColor = '#B9B9B9';
                        }   
                    }
                }
                doc.content[0].margin = [50, 0, 50, 30];
                doc.styles.title = {
                    margin: [0, 50, 0, 0],
                    color: 'black',
                    fontSize: '32',
                    alignment: 'center',

                }
                doc.styles['td:nth-child(2)'] = {
                    width: '100px',
                    'max-width': '100px'
                }
                doc.styles.tableHeader = {

                    fillColor: '#0F72E2',
                    color: 'white'
                }
                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                doc.styles.tableHeader.alignment = 'center';
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyOdd.alignment = 'center';
            },

            orientation: 'landscape'
        }
        ],
        language: {
            "aria": {
                "sortAscending": "Activar para ordenar la columna de manera ascendente",
                "sortDescending": "Activar para ordenar la columna de manera descendente"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmente"
            },
            "buttons": {
                "collection": "Colección",
                "colvis": "Visibilidad",
                "colvisRestore": "Restaurar visibilidad",
                "copy": "Copiar",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "createState": "Crear Estado",
                "removeAllStates": "Borrar Todos los Estados",
                "removeState": "Borrar Estado",
                "renameState": "Renombrar Estado",
                "savedStates": "Guardar Estado",
                "stateRestore": "Restaurar Estado",
                "updateState": "Actualizar Estado"
            },
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor",
                "conditions": {
                    "date": {
                        "after": "Después",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina con",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "startsWith": "Inicia con",
                        "notEmpty": "No vacío",
                        "notContains": "No Contiene",
                        "notEndsWith": "No Termina",
                        "notStartsWith": "No Comienza"
                    },
                    "array": {
                        "equals": "Igual a",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "not": "Diferente",
                        "notEmpty": "No vacío",
                        "without": "Sin"
                    }
                },
                "data": "Datos"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "countFiltered": "{shown} ({total})",
                "collapseMessage": "Colapsar",
                "showMessage": "Mostrar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ",",
            "datetime": {
                "previous": "Anterior",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "am",
                    "pm"
                ],
                "next": "Siguiente",
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
                }
            },
            "decimal": ".",
            "emptyTable": "No hay datos disponibles en la tabla",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "stateRestore": {
                "removeTitle": "Eliminar",
                "creationModal": {
                    "search": "Buscar",
                    "button": "Crear",
                    "columns": {
                        "search": "Columna de búsqueda",
                        "visible": "Columna de visibilidad"
                    },
                    "name": "Nombre:",
                    "order": "Ordenar",
                    "paging": "Paginar",
                    "scroller": "Posición de desplazamiento",
                    "searchBuilder": "Creador de búsquedas",
                    "select": "Selector",
                    "title": "Crear nuevo",
                    "toggleLabel": "Incluye:"
                },
                "duplicateError": "Ya existe un valor con el mismo nombre",
                "emptyError": "No puede ser vacío",
                "emptyStates": "No se han guardado",
                "removeConfirm": "Esta seguro de eliminar %s?",
                "removeError": "Fallo al eliminar",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Renombrar",
                "renameLabel": "Nuevo nombre para %s:",
                "renameTitle": "Renombrar"
            },
            "infoEmpty": "No hay datos para mostrar"
        }
    });

    table.buttons().container()
        .appendTo('#dataTableGrados_wrapper .col-md-6:eq(0)');
});




$(document).ready(function () {
    var table = $('#dataTableMaterias').DataTable({
        lengthMenu: [5, 10, 15, 25],
        scrollX: true,
        scrollY: 180,
        responsive: true,
        autoWidth: true,
        autoFill: true,
        order: [[0, 'desc']],
        buttons: [
        {
            text: "<i class='fa-solid fa-file-pdf'></i>",
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger btn-lg ',
            extend: 'pdfHtml5',
            title: 'Centro Escolar Santa Teresita',
            exportOptions: {
                columns: [1, 2, 3, 5, 6, 7]
            },
            customize: function (doc) {
                var table = doc.content[1].table;
                for (var i = 0; i < table.body.length; i++) {
                    var row = table.body[i];
                    for (var j = 0; j < row.length; j++) {
                        var cell = row[j];
                        if (cell.text === "Activo") {
                            cell.text = { text: "Activo", color: 'white', fontSize: 12};
                            cell.fillColor = '#57D386';
                        } else if (cell.text === "Inactivo") {
                            cell.text = { text: "Inactivo", color: 'white',fontSize: 12 };
                            cell.fillColor = '#B9B9B9';
                        }   
                    }
                }
                doc.content[0].margin = [50, 0, 50, 30];
                doc.styles.title = {
                    margin: [0, 50, 0, 0],
                    color: 'black',
                    fontSize: '32',
                    alignment: 'center',

                }
                doc.styles['td:nth-child(2)'] = {
                    width: '100px',
                    'max-width': '100px'
                }
                doc.styles.tableHeader = {

                    fillColor: '#0F72E2',
                    color: 'white'
                }
                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                doc.styles.tableHeader.alignment = 'center';
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyOdd.alignment = 'center';
            },

            orientation: 'landscape'
        }
        ],
        language: {
            "aria": {
                "sortAscending": "Activar para ordenar la columna de manera ascendente",
                "sortDescending": "Activar para ordenar la columna de manera descendente"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmente"
            },
            "buttons": {
                "collection": "Colección",
                "colvis": "Visibilidad",
                "colvisRestore": "Restaurar visibilidad",
                "copy": "Copiar",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "createState": "Crear Estado",
                "removeAllStates": "Borrar Todos los Estados",
                "removeState": "Borrar Estado",
                "renameState": "Renombrar Estado",
                "savedStates": "Guardar Estado",
                "stateRestore": "Restaurar Estado",
                "updateState": "Actualizar Estado"
            },
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor",
                "conditions": {
                    "date": {
                        "after": "Después",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina con",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "startsWith": "Inicia con",
                        "notEmpty": "No vacío",
                        "notContains": "No Contiene",
                        "notEndsWith": "No Termina",
                        "notStartsWith": "No Comienza"
                    },
                    "array": {
                        "equals": "Igual a",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "not": "Diferente",
                        "notEmpty": "No vacío",
                        "without": "Sin"
                    }
                },
                "data": "Datos"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "countFiltered": "{shown} ({total})",
                "collapseMessage": "Colapsar",
                "showMessage": "Mostrar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ",",
            "datetime": {
                "previous": "Anterior",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "am",
                    "pm"
                ],
                "next": "Siguiente",
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
                }
            },
            "decimal": ".",
            "emptyTable": "No hay datos disponibles en la tabla",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "stateRestore": {
                "removeTitle": "Eliminar",
                "creationModal": {
                    "search": "Buscar",
                    "button": "Crear",
                    "columns": {
                        "search": "Columna de búsqueda",
                        "visible": "Columna de visibilidad"
                    },
                    "name": "Nombre:",
                    "order": "Ordenar",
                    "paging": "Paginar",
                    "scroller": "Posición de desplazamiento",
                    "searchBuilder": "Creador de búsquedas",
                    "select": "Selector",
                    "title": "Crear nuevo",
                    "toggleLabel": "Incluye:"
                },
                "duplicateError": "Ya existe un valor con el mismo nombre",
                "emptyError": "No puede ser vacío",
                "emptyStates": "No se han guardado",
                "removeConfirm": "Esta seguro de eliminar %s?",
                "removeError": "Fallo al eliminar",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Renombrar",
                "renameLabel": "Nuevo nombre para %s:",
                "renameTitle": "Renombrar"
            },
            "infoEmpty": "No hay datos para mostrar"
        }
    });

    table.buttons().container()
        .appendTo('#dataTableMaterias_wrapper .col-md-6:eq(0)');
});



$(document).ready(function () {
    var table = $('#dataTableDirector').DataTable({
        lengthMenu: [5, 10, 15, 25],
        scrollX: true,
        scrollY: 180,
        responsive: true,
        autoWidth: true,
        autoFill: true,
        order: [[0, 'desc']],
        buttons: [
        {
            text: "<i class='fa-solid fa-file-pdf'></i>",
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger btn-lg ',
            extend: 'pdfHtml5',
            title: 'Centro Escolar Santa Teresita',
            exportOptions: {
                columns: [1, 2, 3, 5, 6, 7]
            },
            customize: function (doc) {
                var table = doc.content[1].table;
                for (var i = 0; i < table.body.length; i++) {
                    var row = table.body[i];
                    for (var j = 0; j < row.length; j++) {
                        var cell = row[j];
                        if (cell.text === "Activo") {
                            cell.text = { text: "Activo", color: 'white', fontSize: 12};
                            cell.fillColor = '#57D386';
                        } else if (cell.text === "Inactivo") {
                            cell.text = { text: "Inactivo", color: 'white',fontSize: 12 };
                            cell.fillColor = '#B9B9B9';
                        }   
                    }
                }
                doc.content[0].margin = [50, 0, 50, 30];
                doc.styles.title = {
                    margin: [0, 50, 0, 0],
                    color: 'black',
                    fontSize: '32',
                    alignment: 'center',

                }
                doc.styles['td:nth-child(2)'] = {
                    width: '100px',
                    'max-width': '100px'
                }
                doc.styles.tableHeader = {

                    fillColor: '#0F72E2',
                    color: 'white'
                }
                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                doc.styles.tableHeader.alignment = 'center';
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyOdd.alignment = 'center';
            },

            orientation: 'landscape'
        }
        ],
        language: {
            "aria": {
                "sortAscending": "Activar para ordenar la columna de manera ascendente",
                "sortDescending": "Activar para ordenar la columna de manera descendente"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmente"
            },
            "buttons": {
                "collection": "Colección",
                "colvis": "Visibilidad",
                "colvisRestore": "Restaurar visibilidad",
                "copy": "Copiar",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "createState": "Crear Estado",
                "removeAllStates": "Borrar Todos los Estados",
                "removeState": "Borrar Estado",
                "renameState": "Renombrar Estado",
                "savedStates": "Guardar Estado",
                "stateRestore": "Restaurar Estado",
                "updateState": "Actualizar Estado"
            },
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor",
                "conditions": {
                    "date": {
                        "after": "Después",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina con",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "startsWith": "Inicia con",
                        "notEmpty": "No vacío",
                        "notContains": "No Contiene",
                        "notEndsWith": "No Termina",
                        "notStartsWith": "No Comienza"
                    },
                    "array": {
                        "equals": "Igual a",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "not": "Diferente",
                        "notEmpty": "No vacío",
                        "without": "Sin"
                    }
                },
                "data": "Datos"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "countFiltered": "{shown} ({total})",
                "collapseMessage": "Colapsar",
                "showMessage": "Mostrar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ",",
            "datetime": {
                "previous": "Anterior",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "am",
                    "pm"
                ],
                "next": "Siguiente",
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
                }
            },
            "decimal": ".",
            "emptyTable": "No hay datos disponibles en la tabla",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "stateRestore": {
                "removeTitle": "Eliminar",
                "creationModal": {
                    "search": "Buscar",
                    "button": "Crear",
                    "columns": {
                        "search": "Columna de búsqueda",
                        "visible": "Columna de visibilidad"
                    },
                    "name": "Nombre:",
                    "order": "Ordenar",
                    "paging": "Paginar",
                    "scroller": "Posición de desplazamiento",
                    "searchBuilder": "Creador de búsquedas",
                    "select": "Selector",
                    "title": "Crear nuevo",
                    "toggleLabel": "Incluye:"
                },
                "duplicateError": "Ya existe un valor con el mismo nombre",
                "emptyError": "No puede ser vacío",
                "emptyStates": "No se han guardado",
                "removeConfirm": "Esta seguro de eliminar %s?",
                "removeError": "Fallo al eliminar",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Renombrar",
                "renameLabel": "Nuevo nombre para %s:",
                "renameTitle": "Renombrar"
            },
            "infoEmpty": "No hay datos para mostrar"
        }
    });

    table.buttons().container()
        .appendTo('#dataTableDirector_wrapper .col-md-6:eq(0)');
});


$(document).ready(function () {
    var table = $('#dataTableAdmin').DataTable({
        lengthMenu: [5, 10, 15, 25],
        scrollX: true,
        scrollY: 180,
        responsive: true,
        autoWidth: true,
        autoFill: true,
        order: [[0, 'desc']],
        buttons: [
        {
            text: "<i class='fa-solid fa-file-pdf'></i>",
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger btn-lg',
            extend: 'pdfHtml5',
            title: 'Centro Escolar Santa Teresita',
            exportOptions: {
                columns: [0, 1]
            },
            customize: function (doc) {
                var table = doc.content[1].table;
                for (var i = 0; i < table.body.length; i++) {
                    var row = table.body[i];
                    for (var j = 0; j < row.length; j++) {
                        var cell = row[j];
                        if (cell.text === "Activo") {
                            cell.text = { text: "Activo", color: 'white', fontSize: 12};
                            cell.fillColor = '#57D386';
                        } else if (cell.text === "Inactivo") {
                            cell.text = { text: "Inactivo", color: 'white',fontSize: 12 };
                            cell.fillColor = '#B9B9B9';
                        }   
                    }
                }
                doc.content[0].margin = [50, 0, 50, 30];
                doc.styles.title = {
                    margin: [0, 50, 0, 0],
                    color: 'black',
                    fontSize: '32',
                    alignment: 'center',

                }
                doc.styles['td:nth-child(2)'] = {
                    width: '100px',
                    'max-width': '100px'
                }
                doc.styles.tableHeader = {

                    fillColor: '#0F72E2',
                    color: 'white'
                }
                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                doc.styles.tableHeader.alignment = 'center';
                doc.styles.tableBodyEven.alignment = 'center';
                doc.styles.tableBodyOdd.alignment = 'center';
            },

            orientation: 'landscape'
        }
        ],
        language: {
            "aria": {
                "sortAscending": "Activar para ordenar la columna de manera ascendente",
                "sortDescending": "Activar para ordenar la columna de manera descendente"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmente"
            },
            "buttons": {
                "collection": "Colección",
                "colvis": "Visibilidad",
                "colvisRestore": "Restaurar visibilidad",
                "copy": "Copiar",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir",
                "createState": "Crear Estado",
                "removeAllStates": "Borrar Todos los Estados",
                "removeState": "Borrar Estado",
                "renameState": "Renombrar Estado",
                "savedStates": "Guardar Estado",
                "stateRestore": "Restaurar Estado",
                "updateState": "Actualizar Estado"
            },
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "processing": "Procesando...",
            "search": "Buscar:",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor",
                "conditions": {
                    "date": {
                        "after": "Después",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual a",
                        "not": "Diferente de",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina con",
                        "equals": "Igual a",
                        "not": "Diferente de",
                        "startsWith": "Inicia con",
                        "notEmpty": "No vacío",
                        "notContains": "No Contiene",
                        "notEndsWith": "No Termina",
                        "notStartsWith": "No Comienza"
                    },
                    "array": {
                        "equals": "Igual a",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "not": "Diferente",
                        "notEmpty": "No vacío",
                        "without": "Sin"
                    }
                },
                "data": "Datos"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d",
                "countFiltered": "{shown} ({total})",
                "collapseMessage": "Colapsar",
                "showMessage": "Mostrar Todo"
            },
            "select": {
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "%d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                },
                "rows": {
                    "1": "1 fila seleccionada",
                    "_": "%d filas seleccionadas"
                }
            },
            "thousands": ",",
            "datetime": {
                "previous": "Anterior",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "am",
                    "pm"
                ],
                "next": "Siguiente",
                "months": {
                    "0": "Enero",
                    "1": "Febrero",
                    "10": "Noviembre",
                    "11": "Diciembre",
                    "2": "Marzo",
                    "3": "Abril",
                    "4": "Mayo",
                    "5": "Junio",
                    "6": "Julio",
                    "7": "Agosto",
                    "8": "Septiembre",
                    "9": "Octubre"
                },
                "weekdays": [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
                }
            },
            "decimal": ".",
            "emptyTable": "No hay datos disponibles en la tabla",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
            "lengthMenu": "Mostrar _MENU_ entradas",
            "stateRestore": {
                "removeTitle": "Eliminar",
                "creationModal": {
                    "search": "Buscar",
                    "button": "Crear",
                    "columns": {
                        "search": "Columna de búsqueda",
                        "visible": "Columna de visibilidad"
                    },
                    "name": "Nombre:",
                    "order": "Ordenar",
                    "paging": "Paginar",
                    "scroller": "Posición de desplazamiento",
                    "searchBuilder": "Creador de búsquedas",
                    "select": "Selector",
                    "title": "Crear nuevo",
                    "toggleLabel": "Incluye:"
                },
                "duplicateError": "Ya existe un valor con el mismo nombre",
                "emptyError": "No puede ser vacío",
                "emptyStates": "No se han guardado",
                "removeConfirm": "Esta seguro de eliminar %s?",
                "removeError": "Fallo al eliminar",
                "removeJoiner": "y",
                "removeSubmit": "Eliminar",
                "renameButton": "Renombrar",
                "renameLabel": "Nuevo nombre para %s:",
                "renameTitle": "Renombrar"
            },
            "infoEmpty": "No hay datos para mostrar"
        }
    });

    table.buttons().container()
        .appendTo('#dataTableAdmin_wrapper .col-md-6:eq(0)');
});
