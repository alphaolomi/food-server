import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';

type StoreRef = { id: number; name: string; slug: string };

export default function AdminCategoriesCreate({
    store,
}: {
    store: StoreRef;
}) {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        position: 0,
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('admin.stores.categories.store', store.id));
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    New category · {store.name}
                </h2>
            }
        >
            <Head title="New category" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <p className="mb-4 text-sm">
                        <Link
                            href={route('admin.stores.categories.index', store.id)}
                            className="text-indigo-600 hover:text-indigo-800"
                        >
                            ← Categories
                        </Link>
                    </p>
                    <form
                        onSubmit={submit}
                        className="max-w-xl space-y-6 bg-white p-6 shadow sm:rounded-lg"
                    >
                        <div>
                            <InputLabel htmlFor="name" value="Name" />
                            <TextInput
                                id="name"
                                className="mt-1 block w-full"
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                                required
                            />
                            <InputError message={errors.name} className="mt-2" />
                        </div>
                        <div>
                            <InputLabel htmlFor="position" value="Sort position" />
                            <TextInput
                                id="position"
                                type="number"
                                className="mt-1 block w-full"
                                value={String(data.position)}
                                onChange={(e) =>
                                    setData('position', parseInt(e.target.value, 10) || 0)
                                }
                            />
                            <InputError message={errors.position} className="mt-2" />
                        </div>
                        <PrimaryButton disabled={processing}>Save</PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
