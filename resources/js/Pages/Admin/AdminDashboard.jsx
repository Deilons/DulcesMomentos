import { useForm, usePage } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import InputError from "@/Components/InputError";

export default function AdminDashboard() {
    const { props } = usePage();
    const { data, setData, post, reset, processing, errors } = useForm({
        name: "",
        email: "",
        password: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post(route("admin.operarios.store"), {
            onSuccess: () => reset(),
        });
    };

    return (
        <div>
            <h1 className="text-2xl font-bold mb-4">Gestión de Operarios</h1>
            
            {/* Formulario para crear operarios */}
            <form onSubmit={submit} className="mb-8">
                <div>
                    <InputLabel htmlFor="name" value="Nombre del Operario" />
                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        className="mt-1 block w-full"
                        onChange={(e) => setData("name", e.target.value)}
                        required
                    />
                    <InputError message={errors.name} className="mt-2" />
                </div>
                <div className="mt-4">
                    <InputLabel htmlFor="email" value="Correo Electrónico" />
                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        onChange={(e) => setData("email", e.target.value)}
                        required
                    />
                    <InputError message={errors.email} className="mt-2" />
                </div>
                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Contraseña" />
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        onChange={(e) => setData("password", e.target.value)}
                        required
                    />
                    <InputError message={errors.password} className="mt-2" />
                </div>
                <PrimaryButton className="mt-4" disabled={processing}>
                    Crear Operario
                </PrimaryButton>
            </form>

            {/* Tabla de operarios */}
            <h2 className="text-xl font-bold mb-4">Lista de Operarios</h2>
            <table className="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th className="border border-gray-300 px-4 py-2">Nombre</th>
                        <th className="border border-gray-300 px-4 py-2">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    {props.operarios.map((operario) => (
                        <tr key={operario.id}>
                            <td className="border border-gray-300 px-4 py-2">{operario.name}</td>
                            <td className="border border-gray-300 px-4 py-2">{operario.email}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
 