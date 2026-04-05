import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import DangerButton from '@/Components/DangerButton';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head, Link, router } from '@inertiajs/react';

type StoreRef = { id: number; name: string; slug: string };
type ItemRow = {
    id: number;
    name: string;
    category_id: number;
    category_name?: string;
    price_cents: number;
    is_available: boolean;
};

export default function AdminCatalogItemsIndex({
    store,
    items,
}: {
    store: StoreRef;
    items: ItemRow[];
}) {
    const destroy = (id: number) => {
        if (!confirm('Delete this menu item?')) {
            return;
        }
        router.delete(
            route('admin.stores.catalog-items.destroy', [store.id, id]),
        );
    };

    return (
        <AuthenticatedLayout
            header={
                <div className="flex flex-wrap items-center justify-between gap-4">
                    <h2 className="text-xl font-semibold leading-tight text-gray-800">
                        Menu items · {store.name}
                    </h2>
                    <Link href={route('admin.stores.catalog-items.create', store.id)}>
                        <PrimaryButton type="button">Add item</PrimaryButton>
                    </Link>
                </div>
            }
        >
            <Head title={`Menu · ${store.name}`} />

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
                            {items.length === 0 ? (
                                <li className="p-6 text-gray-600">No items yet.</li>
                            ) : (
                                items.map((i) => (
                                    <li
                                        key={i.id}
                                        className="flex flex-wrap items-center justify-between gap-4 p-4"
                                    >
                                        <div>
                                            <span className="font-medium text-gray-900">
                                                {i.name}
                                            </span>
                                            <p className="text-sm text-gray-500">
                                                {i.category_name ?? '—'} ·{' '}
                                                {(i.price_cents / 100).toFixed(0)} TZS
                                                {!i.is_available ? ' · unavailable' : ''}
                                            </p>
                                        </div>
                                        <div className="flex gap-2">
                                            <Link
                                                href={route(
                                                    'admin.stores.catalog-items.edit',
                                                    [store.id, i.id],
                                                )}
                                                className="text-sm text-indigo-600 hover:text-indigo-800"
                                            >
                                                Edit
                                            </Link>
                                            <DangerButton
                                                type="button"
                                                className="px-2 py-1 text-xs"
                                                onClick={() => destroy(i.id)}
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
