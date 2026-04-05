import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

type OrderRow = {
    id: number;
    store_id: number;
    status: string;
    total_cents: number;
    fulfillment_type: string;
    lines?: Array<{
        catalog_item_id: number;
        quantity: number;
        unit_price_cents: number;
        line_total_cents: number;
        item?: { name?: string };
    }>;
    tickets?: Array<{ id: number; status: string }>;
    created_at: string | null;
};

export default function AdminOrdersIndex({ orders }: { orders: OrderRow[] }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Order board
                </h2>
            }
        >
            <Head title="Orders" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="divide-y divide-gray-200">
                            {orders.length === 0 ? (
                                <p className="p-6 text-gray-600">No orders yet.</p>
                            ) : (
                                orders.map((order) => (
                                    <div
                                        key={order.id}
                                        className="p-6 text-sm text-gray-800"
                                    >
                                        <div className="flex flex-wrap items-baseline justify-between gap-2">
                                            <span className="font-semibold">
                                                Order #{order.id}
                                            </span>
                                            <span className="text-gray-500">
                                                {order.status} ·{' '}
                                                {(order.total_cents / 100).toFixed(2)}{' '}
                                                TZS
                                            </span>
                                        </div>
                                        <p className="mt-1 text-gray-500">
                                            {order.fulfillment_type} · Store #
                                            {order.store_id}
                                        </p>
                                        {order.tickets?.length ? (
                                            <p className="mt-2 text-xs uppercase tracking-wide text-orange-700">
                                                Ticket:{' '}
                                                {order.tickets
                                                    .map((t) => t.status)
                                                    .join(', ')}
                                            </p>
                                        ) : null}
                                        <ul className="mt-3 list-inside list-disc text-gray-600">
                                            {order.lines?.map((line) => (
                                                <li key={line.catalog_item_id}>
                                                    {line.item?.name ?? 'Item'} ×{' '}
                                                    {line.quantity}
                                                </li>
                                            ))}
                                        </ul>
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
