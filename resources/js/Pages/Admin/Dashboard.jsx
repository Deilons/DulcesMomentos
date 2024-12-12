import { useForm, usePage } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import InputError from "@/Components/InputError";

export default function AdminDashboard() {
    console.log(usePage().props.auth.user);
    return (
        <div>
            <h1>Admin Dashboard</h1>
        </div>
    );
}
