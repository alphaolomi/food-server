import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';

type StoreRow = {
    id: number;
    name: string;
    slug: string;
    organization_name: string;
    can_manage_catalog: boolean;
};

export default function AdminStoresIndex({
    stores,
}: {
    stores: StoreRow[];
}) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Stores
                </h2>
            }
        >
            <Head title="Stores" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="divide-y divide-gray-200">
                            {stores.length === 0 ? (
                                <p className="p-6 text-gray-600">
                                    You are not assigned to any organization yet.
                                </p>
                            ) : (
                                stores.map((s) => (
                                    <div
                                        key={s.id}
                                        className="flex flex-wrap items-center justify-between gap-4 p-6"
                                    >
                                        <div>
                                            <p className="font-medium text-gray-900">
                                                {s.name}
                                            </p>
                                            <p className="text-sm text-gray-500">
                                                {s.organization_name} · {s.slug}
                                            </p>
                                        </div>
                                        {s.can_manage_catalog ? (
                                            <div className="flex flex-wrap gap-3 text-sm">
                                                <Link
                                                    href={route(
                                                        'admin.stores.categories.index',
                                                        s.id,
                                                    )}
                                                    className="text-indigo-600 hover:text-indigo-800"
                                                >
                                                    Categories
                                                </Link>
                                                <Link
                                                    href={route(
                                                        'admin.stores.catalog-items.index',
                                                        s.id,
                                                    )}
                                                    className="text-indigo-600 hover:text-indigo-800"
                                                >
                                                    Menu items
                                                </Link>
                                            </div>
                                        ) : (
                                            <span className="text-sm text-gray-400">
                                                Catalog (view only — staff role)
                                            </span>
                                        )}
                                    </div>
                                ))
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
