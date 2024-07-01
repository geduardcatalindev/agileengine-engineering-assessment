import { useState, useEffect } from "react";
import { SearchTerms } from "./Search";

export default function LocationsTable({
    searchTerms,
}: {
    searchTerms: SearchTerms;
}) {
    const [isLoaded, setIsLoaded] = useState(false);
    const [items, setItems] = useState<any>([]);
    const [error, setError] = useState<any>("");

    const getData = (url: string) => {
        fetch(url)
            .then((res) => res.json())
            .then((result) => {
                if (result.status === "failed") {
                    setError(result.message);
                } else {
                    setItems(result);
                }
                setIsLoaded(true);
            });
    };

    useEffect(() => {
        getData("http://localhost/api/location");
    }, []);

    useEffect(() => {
        setIsLoaded(false);

        let searchParams = "";

        if (
            searchTerms !== undefined &&
            searchTerms.radius !== undefined &&
            searchTerms.latitude !== undefined &&
            searchTerms.longitude !== undefined
        ) {
            searchParams =
                `?radius=${searchTerms.radius}&latitude=${searchTerms.latitude}&longitude=${searchTerms.longitude}` as string;
        }

        getData(`http://localhost/api/location${searchParams}`);
    }, [searchTerms]);

    if (error) {
        return <div>{error}</div>;
    } else if (!isLoaded) {
        return <div>Loading...</div>;
    } else {
        return (
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Latitude</td>
                        <td>Longitude</td>
                        <td>Food Items</td>
                    </tr>
                </thead>
                <tbody>
                    {items.data.length &&
                        items.data.map((item: any) => (
                            <tr key={item.id}>
                                <td>{item.applicant}</td>
                                <td>{item.latitude}</td>
                                <td>{item.longitude}</td>
                                <td>{item.food_items}</td>
                            </tr>
                        ))}
                </tbody>
            </table>
        );
    }
}
