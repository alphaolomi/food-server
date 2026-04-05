import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import DangerButton from '@/Components/DangerButton';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head, Link, router } from '@inertiajs/react';

type StoreRef = { id: number; name: string; slug: string };
type CategoryRow = { id: number; name: string; position: number };

export default function AdminCategoriesIndex({
    store,
    categories,
}: {
    store: StoreRef;
    categories: CategoryRow[];
}) {
    const destroy = (id: number) => {
        if (!confirm('Delete this category?')) {
            return;
        }
        router.delete(
            route('admin.stores.categories.destroy', [store.id, id]),
        );
    };

    return (
        <AuthenticatedLayout
            header={
                <div className="flex flex-wrap items-center justify-between gap-4">
                    <h2 className="text-xl font-semibold leading-tight text-gray-800">
                        Categories · {store.name}
                    </h2>
                    <Link href={route('admin.stores.categories.create', store.id)}>
                        <PrimaryButton type="button">Add category</PrimaryButton>
                    </Link>
                </div>
            }
        >
            <Head title={`Categories · ${store.name}`} />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <p className="mb-4 text-sm text-gray-600">
                        <Link
                            href={route('admin.stores.index')}
                            className="text-indigo-600 hover:text-indigo-800"
                        >
                            ← Stores
                        </Link>
                    </p>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <ul className="divide-y divide-gray-200">
                            {categories.length === 0 ? (
                                <li className="p-6 text-gray-600">
                                    No categories yet.
                                </li>
                            ) : (
                                categories.map((c) => (
                                    <li
                                        key={c.id}
                                        className="flex flex-wrap items-center justify-between gap-4 p-4"
                                    >
                                        <span className="text-gray-900">
                                            {c.name}{' '}
                                            <span className="text-sm text-gray-500">
                                                (sort {c.position})
                                            </span>
                                        </span>
                                        <div className="flex gap-2">
                                            <Link
                                                href={route(
                                                    'admin.stores.categories.edit',
                                                    [store.id, c.id],
                                                )}
                                                className="text-sm text-indigo-600 hover:text-indigo-800"
                                            >
                                                Edit
                                            </Link>
                                            <DangerButton
                                                type="button"
                                                className="px-2 py-1 text-xs"
                                                onClick={() => destroy(c.id)}
                                            >
                                                Delete
                                            </DangerButton>
                                        </div>
                                    </li>
                                ))
                            )}
                        </ul>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
