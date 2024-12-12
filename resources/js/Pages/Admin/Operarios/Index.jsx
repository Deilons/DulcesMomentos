import React from 'react';
import { Link } from '@inertiajs/react';
import { router } from '@inertiajs/react';

const handleDelete = (id) => {
    if (confirm("¿Estás seguro de eliminar este operario?")) {
        router.delete(route('admin.operarios.destroy', id), {
            onSuccess: () => alert('Operario eliminado exitosamente'),
            onError: (errors) => alert('Ocurrió un error al eliminar el operario'),
        });
    }
};

const Index = ({ operarios }) => {
    return (
        <div>
            <h1 className="text-2xl font-bold mb-4">Gestión de Operarios</h1>
            <Link
                href={route('admin.operarios.create')}
                className="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block"
            >
                Crear Nuevo Operario
            </Link>
            <table className="table-auto w-full border-collapse border border-gray-300 mt-4">
                <thead>
                    <tr>
                        <th className="border px-4 py-2">ID</th>
                        <th className="border px-4 py-2">Nombre</th>
                        <th className="border px-4 py-2">Email</th>
                        <th className="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {operarios.map((operario) => (
                        <tr key={operario.id}>
                            <td className="border px-4 py-2">{operario.id}</td>
                            <td className="border px-4 py-2">{operario.name}</td>
                            <td className="border px-4 py-2">{operario.email}</td>
                            <td className="border px-4 py-2 flex gap-2">
                                <Link
                                    href={route('admin.operarios.edit', operario.id)}
                                    className="bg-yellow-500 text-white px-4 py-2 rounded"
                                >
                                    Editar
                                </Link>
                                <button
                                    onClick={() => handleDelete(operario.id)}
                                    className="bg-red-500 text-white px-4 py-2 rounded"
                                >
                                    Eliminar
                                </button>
                                <button>
                                    <Link
                                        href={route('admin.operarios.show', operario.id)}
                                        className="bg-green-500 text-white px-4 py-2 rounded"
                                    >
                                        Ver
                                    </Link>
                                </button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Index;
