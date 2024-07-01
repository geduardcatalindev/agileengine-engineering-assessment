import { useState, useRef } from "react";
import LocationsTable from "./LocationsTable";

export type SearchTerms = {
    radius: number | null;
    latitude: number | null;
    longitude: number | null;
};

export default function Search() {
    const [searchTerms, setSearchTerms] = useState<SearchTerms>({
        radius: null,
        latitude: null,
        longitude: null,
    });
    const radius = useRef<any>(null);
    const latitude = useRef<any>(null);
    const longitude = useRef<any>(null);

    const handleSearch = (event: any) => {
        if (
            radius.current != null &&
            latitude.current != null &&
            longitude.current != null
        ) {
            setSearchTerms({
                radius: radius.current.value,
                latitude: latitude.current.value,
                longitude: longitude.current.value,
            });
        }
    };

    return (
        <>
            <input
                ref={radius}
                type="text"
                id="radius"
                name="radius"
                placeholder="Radius"
            />
            <input
                ref={latitude}
                type="text"
                id="latitude"
                name="latitude"
                placeholder="Latitude"
            />
            <input
                ref={longitude}
                type="text"
                id="longitude"
                name="longitude"
                placeholder="Longitude"
            />
            <input
                type="button"
                id="search"
                value="Search"
                onClick={handleSearch}
            />
            <LocationsTable searchTerms={searchTerms}></LocationsTable>
        </>
    );
}
