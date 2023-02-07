<html>

<head>
    <script type="text/javascript" src="js/operaciones.js"></script>



    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.10/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.10/themes/icon.css">

    <script type="text/javascript" src="jquery-easyui-1.10.10/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.10/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.10/locale/easyui-lang-es.js"></script>

    <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body style="background-color:#CFD8DC;">


    <article>
        <h2>CRUD BODEGA</h2>

        <table id="dg" title="Tabla" class="easyui-datagrid" url='model/buscarBodega.php' toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="id_bod" width="50">ID</th>
                    <th field="nombre_bod" width="50">NOMBRE</th>
                    <th field="direccion_bod" width="50">DIRECCION</th>
                    <th field="estado" width="50">ESTADO</th>
                </tr>
            </thead>
        </table>
        <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nueva Bodega</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Bodega</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Bodega</a>
            <a><input id="id_bod" oninput="searchUser()"></a>
        </div>

        <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Informacion de la Bodega</h3>
                <div style="margin-bottom:10px">
                    <input name="id_bod" class="easyui-textbox" required="true" label="ID:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="nombre_bod" class="easyui-textbox" required="true" label="NOMBRE:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="direccion_bod" class="easyui-textbox" required="true" label="DIRECCION:" style="width:100%">
                </div>
            </form>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
        </div>

        <div id="dlgedit" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlgedit-buttons'">
            <form id="fmedit" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Informacion de la Bodega</h3>
                <div style="margin-bottom:10px">
                    <input name="id_bod" class="easyui-textbox" required="true" label="ID:" style="width:100%" readonly="readonly">
                </div>
                <div style="margin-bottom:10px">
                    <input name="nombre_bod" class="easyui-textbox" required="true" label="NOMBRE:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="direccion_bod" class="easyui-textbox" required="true" label="DIRECCION:" style="width:100%">
                </div>
            </form>
        </div>
        <div id="dlgedit-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUserEdit()" style="width:90px">Guardar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgedit').dialog('close')" style="width:90px">Cancelar</a>
        </div>

        <script type="text/javascript">
            var url;

            function newUser() {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nueva Bodega');
                $('#fm').form('clear');
                url = 'model/insertarBodega.php';
            }

            function editUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $('#dlgedit').dialog('open').dialog('center').dialog('setTitle', 'Editar Estudiante');
                    $('#fmedit').form('load', row);
                    url = 'model/editarBodega.php?id=' + row.id;
                }
            }

            function saveUser() {
                $('#fm').form('submit', {
                    url: url,
                    iframe: false,
                    onSubmit: function() {
                        return $(this).form('validate');
                    },
                    success: function(result) {
                        var result = eval('(' + result + ')');
                        if (result.errorMsg) {                            
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dlg').dialog('close'); // close the dialog
                            $('#dg').datagrid('reload'); // reload the user data
                        }
                    }
                });
            }

            function saveUserEdit() {
                $('#fmedit').form('submit', {
                    url: url,
                    iframe: false,
                    onSubmit: function() {
                        return $(this).form('validate');
                    },
                    success: function(result) {
                        var result = eval('(' + result + ')');
                        if (result.errorMsg) {                            
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dlgedit').dialog('close'); // close the dialog
                            $('#dg').datagrid('reload'); // reload the user data
                        }
                    }
                });
            }

            function destroyUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $.messager.confirm('Confirm', 'Estas seguro de eliminar esta bodega?', function(r) {
                        if (r) {
                            $.post('model/eliminarBodega.php?id=' + row.id,{
                                id_bod: row.id_bod
                            }, function(result) {
                                if (result.success) {
                                    $.messager.show({ // show error message
                                        title: 'Error',
                                        msg: result.errorMsg
                                    });
                                } else {
                                    $('#dg').datagrid('reload');
                                    
                                }
                            }, 'json');
                        }
                    });
                }
            }

            /* function destroyUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function(r) {
                        if (r) {
                            $.post('model/eliminarBodega.php',{
                                id_bod: row.id_bod
                            }, function(result) {
                                if (result.success) {
                                    $('#dg').datagrid('reload'); // reload the user data
                                } else {
                                    $.messager.show({ // show error message
                                        title: 'Error',
                                        msg: result.errorMsg
                                    });
                                }
                            }, 'json');
                        }
                    });
                }
            } */
            function searchUser() {
                $('#dg').datagrid('load', {
                    id_bod: $('#id_bod').val()
                });
            }
        </script>
    </article>

</body>

</html>