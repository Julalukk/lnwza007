import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import Layout from '@/layouts/app-layout';

interface News {
    id: number;
    title: string;
    summary: string;
    image_url?: string;
    published_at: string;
}

interface NewsIndexProps extends PageProps {
    news: {
        data: News[];
        links: any[];
        meta: any;
    };
}

export default function NewsIndex({ news }: NewsIndexProps) {
    return (
        <Layout>
            <Head title="รวมข่าว" />
            
            <div className="container mx-auto px-4 py-8">
                <h1 className="text-3xl font-bold text-gray-900 mb-8">รวมข่าว</h1>
                
                <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {news.data.map((item) => (
                        <div key={item.id} className="bg-white rounded-lg shadow-md overflow-hidden">
                            {item.image_url && (
                                <img 
                                    src={item.image_url} 
                                    alt={item.title}
                                    className="w-full h-48 object-cover"
                                />
                            )}
                            <div className="p-6">
                                <h2 className="text-xl font-semibold text-gray-900 mb-2">
                                    <Link 
                                        href={route('news.show', item.id)}
                                        className="hover:text-blue-600 transition-colors"
                                    >
                                        {item.title}
                                    </Link>
                                </h2>
                                <p className="text-gray-600 mb-4">{item.summary}</p>
                                <p className="text-sm text-gray-500">
                                    {new Date(item.published_at).toLocaleDateString('th-TH')}
                                </p>
                            </div>
                        </div>
                    ))}
                </div>
                
                {news.data.length === 0 && (
                    <div className="text-center py-12">
                        <p className="text-gray-500 text-lg">ยังไม่มีข่าว</p>
                    </div>
                )}
            </div>
        </Layout>
    );
}
