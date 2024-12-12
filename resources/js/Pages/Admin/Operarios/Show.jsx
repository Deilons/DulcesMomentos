import React from 'react';
import { Link,usePage } from '@inertiajs/react';

export default function Show({ operario }) {

    return (
        <div className="p-4">
            <h1 className="text-2xl font-bold mb-4">Detalles del Operario</h1>
            <div className="mb-4">
                <p><strong>Nombre:</strong> {operario.name}</p>
                <p><strong>Email:</strong> {operario.email}</p>
                <p><strong>Id:</strong> {operario.id}</p>
                <p><strong>Rol:</strong> operario </p>
            </div>
            <Link href={route('admin.operarios.index')} className="text-blue-500">Volver</Link>
        </div>
    );
}
