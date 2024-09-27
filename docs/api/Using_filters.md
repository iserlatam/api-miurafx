### Documentation for Using Filters with Spatie's `laravel-query-builder`

The API now supports filters using the Spatie package `laravel-query-builder`. This allows users to filter data using various query parameters directly in the URL. One of the most commonly used filters is filtering between dates using the `starts_between` filter.

#### Example Filter: Filtering Between Dates

To filter user data between two dates, you can use the following URL format:

```
https://miurafx.com/server/api/providers/users?filter[starts_between]=2024-09-23,2024-09-25
```

#### How it Works:

- **Parameter: `filter[starts_between]`**: This is the key used to filter records between two specific dates.
- **Value: `2024-09-23,2024-09-25`**: You provide two dates, separated by a comma, indicating the range. The first date marks the start, and the second date marks the end of the filter range.

#### Important Notes:

1. **Date Range**: The query filters records that start between the two dates you provide. The operator used for comparison ensures that records starting **from** `2024-09-23` and up **to** `2024-09-25` (inclusive) will be returned.
2. **Error Handling**: If no results are found within the specified range, the system will return an empty collection, or the default pagination may kick in depending on the setup.

### Query Format

- Base URL: `https://miurafx.com/server/api/providers/users`
- Filter Parameter: `filter[starts_between]=YYYY-MM-DD,YYYY-MM-DD`

By using this structure, you can easily apply date range filters and retrieve the data between specified dates.

### Aditional date scopes

- Starts before: `filter[starts_before]=YYYY-MM-DD`
- Starts after: `filter[starts_after]=YYYY-MM-DD`
- Pais (country): `filter[pais]=country`
- Estado (sale status): `filter[cliente.estado]=saleStatus`

Thanks for reading

