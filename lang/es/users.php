<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Líneas de Idioma para Usuarios
    |--------------------------------------------------------------------------
    */

    // General
    'title' => 'Usuarios',
    'model' => 'user',

    // Actions
    'add' => 'Agregar nuevo usuario',
    'edit' => 'Editar usuario',

    // Attributes
    'name' => 'Nombre',
    'email' => 'Correo electrónico',
    'type' => 'Tipo',
    'status' => 'Estado',
    'admin' => 'Admin',
    'client' => 'Cliente',
    'blocked' => 'Bloqueado',

    // Actions datatable
    'block' => 'Bloquear',
    'delete-question' => 'Una vez eliminado, no podrás recuperar este usuario.',

    // Form page
    'information' => 'Información de autenticación',
    'information-description' => 'Agrega aquí los datos de acceso del usuario, así como el tipo de usuario.',

    // Labels
    'user-type' => 'Tipo de usuario',
    'block-user' => 'Bloquear usuario',
    'prevent-logging' => 'Esta acción te impedirá iniciar sesión en el sitio',

    // Messages
    'created-success' => 'Usuario creado exitosamente.',
    'created-error' => 'Ocurrió un error al crear el usuario.',
    'updated-success' => 'Usuario actualizado exitosamente.',
    'updated-error' => 'Ocurrió un error al actualizar el usuario.',
    'deleted-success' => 'Usuario eliminado exitosamente.',
    'deleted-error' => 'Ocurrió un error al eliminar el usuario.',
    'non-existent' => 'Usuario inexistente',
];
