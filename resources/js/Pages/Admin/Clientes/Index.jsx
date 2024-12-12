import { Link, usePage } from '@inertiajs/react';

export default function Clientes({ clientes }) {
    console.log(clientes);
    return (
        <div className="p-6 bg-white shadow-md rounded">
            <h2 className="text-xl font-bold mb-4">Gestión de Clientes</h2>
            <table className="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th className="border px-4 py-2">ID</th>
                        <th className="border px-4 py-2">Nombre</th>
                        <th className="border px-4 py-2">Email</th>
                        <th className="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {clientes.map((cliente) => (
                        <tr key={cliente.id}>
                            <td className="border px-4 py-2">{cliente.id}</td>
                            <td className="border px-4 py-2">{cliente.nombre}</td>
                            <td className="border px-4 py-2">{cliente.email}</td>
                            <td className="border px-4 py-2">
                                <Link href={`/admin/clientes/${cliente.id}/edit`} className="text-blue-600">
                                    Editar
                                </Link>
                                {' | '}
                                <Link href={`/admin/clientes/${cliente.id}/delete`} className="text-red-600">
                                    Eliminar
                                </Link>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
