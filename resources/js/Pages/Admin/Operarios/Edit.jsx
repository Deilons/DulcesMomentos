import React from 'react';
import { useForm } from '@inertiajs/react';

const Edit = ({ operario }) => {
    const { data, setData, put, errors } = useForm({
        name: operario.name || '',
        email: operario.email || '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(route('admin.operarios.update', operario.id));
    };

    return (
        <div>
            <h1 className="text-2xl font-bold mb-4">Editar Operario</h1>
            <form onSubmit={handleSubmit} className="max-w-md space-y-4">
                <div>
                    <label className="block text-gray-700">Nombre:</label>
                    <input
                        type="text"
                        value={data.name}
                        onChange={(e) => setData('name', e.target.value)}
                        className="w-full border rounded px-3 py-2"
                    />
                    {errors.name && <span className="text-red-500 text-sm">{errors.name}</span>}
                </div>
                <div>
                    <label className="block text-gray-700">Email:</label>
                    <input
                        type="email"
                        value={data.email}
                        onChange={(e) => setData('email', e.target.value)}
                        className="w-full border rounded px-3 py-2"
                    />
                    {errors.email && <span className="text-red-500 text-sm">{errors.email}</span>}
                </div>
                <button
                    type="submit"
                    className="bg-blue-500 text-white px-4 py-2 rounded"
                >
                    Actualizar
                </button>
            </form>
        </div>
    );
};

export default Edit;
