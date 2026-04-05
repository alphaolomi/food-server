import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import Checkbox from '@/Components/Checkbox';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';

type StoreRef = { id: number; name: string; slug: string };
type CatOpt = { id: number; name: string };
type ItemRef = {
    id: number;
    category_id: number;
    name: string;
    description: string | null;
    price_cents: number;
    is_available: boolean;
};

export default function AdminCatalogItemsEdit({
    store,
    categories,
    item,
}: {
    store: StoreRef;
    categories: CatOpt[];
    item: ItemRef;
}) {
    const { data, setData, put, processing, errors } = useForm({
        category_id: item.category_id,
        name: item.name,
        description: item.description ?? '',
        price_cents: item.price_cents,
        is_available: item.is_available,
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        put(
            route('admin.stores.catalog-items.update', [store.id, item.id]),
        );
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Edit item · {store.name}
                </h2>
            }
        >
            <Head title="Edit menu item" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <p className="mb-4 text-sm">
                        <Link
                            href={route('admin.stores.catalog-items.index', store.id)}
                            className="text-indigo-600 hover:text-indigo-800"
                        >
                            ← Menu items
                        </Link>
                    </p>
                    <form
                        onSubmit={submit}
                        className="max-w-xl space-y-6 bg-white p-6 shadow sm:rounded-lg"
                    >
                        <div>
                            <InputLabel htmlFor="category_id" value="Category" />
                            <select
                                id="category_id"
                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value={data.category_id}
                                onChange={(e) =>
                                    setData('category_id', parseInt(e.target.value, 10))
                                }
                            >
                                {categories.map((c) => (
                                    <option key={c.id} value={c.id}>
                                        {c.name}
                                    </option>
                                ))}
                            </select>
                            <InputError
                                message={errors.category_id}
                                className="mt-2"
                            />
                        </div>
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
                            <InputLabel htmlFor="description" value="Description" />
                            <textarea
                                id="description"
                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                rows={3}
                                value={data.description}
                                onChange={(e) =>
                                    setData('description', e.target.value)
                                }
                            />
                            <InputError
                                message={errors.description}
                                className="mt-2"
                            />
                        </div>
                        <div>
                            <InputLabel htmlFor="price_cents" value="Price (TZS minor units)" />
                            <TextInput
                                id="price_cents"
                                type="number"
                                className="mt-1 block w-full"
                                value={String(data.price_cents)}
                                onChange={(e) =>
                                    setData(
                                        'price_cents',
                                        parseInt(e.target.value, 10) || 0,
                                    )
                                }
                                required
                            />
                            <InputError
                                message={errors.price_cents}
                                className="mt-2"
                            />
                        </div>
                        <div className="flex items-center gap-2">
                            <Checkbox
                                id="is_available"
                                name="is_available"
                                checked={data.is_available}
                                onChange={(e) =>
                                    setData('is_available', e.target.checked)
                                }
                            />
                            <InputLabel htmlFor="is_available" value="Available" />
                        </div>
                        <PrimaryButton disabled={processing}>Update</PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
