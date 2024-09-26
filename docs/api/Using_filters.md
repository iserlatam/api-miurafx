### Documentation: Using Filters with Laravel Purity in API Requests

**Purpose**: This guide explains how to use filters when interacting with the API, particularly focusing on how to filter records between specific dates. Check the official package documentation to finding out more about the filters here [Laravel Purity](https://abbasudo.github.io/laravel-purity/js-examples/available-methods.html)

#### 1. **Base URL for Filtering**

To filter data using Laravel Purity, users can include filter parameters directly in the URL. The base URL structure for applying filters looks like this:

```
https://miurafx.com/server/api/providers/users
```

#### 2. **Applying Date Filters**

One of the most commonly used filters is the date filter, where you may want to fetch records created within a specific date range.

**Important Note:** The system interprets date filters with the following logic:
- **The operator used is `>` and `<`**, which means the filter selects records **starting the day after** the provided start date and ending **one day before** the provided end date.

**Example URL**:

```
https://miurafx.com/server/api/providers/users?filters[created_at][$between][0]=2024-09-24&filters[created_at][$between][1]=2024-09-26
```

#### 3. **Explanation of Query Parameters**

- **`filters[created_at]`**: Specifies that you are filtering by the `created_at` field (i.e., when the record was created).
- **`[$between]`**: The `$between` operator is used to select records that fall between two dates.
- **`[0]` and `[1]`**: These are the starting and ending dates, respectively.

In the example above:
- **`filters[created_at][$between][0]=2024-09-24`**: This sets the starting date. The system will include records **from 2024-09-25** onwards.
- **`filters[created_at][$between][1]=2024-09-26`**: This sets the ending date. The system will include records **until 2024-09-25** (excluding 2024-09-26).

#### 4. **General Notes**

- The format for dates should follow the standard `YYYY-MM-DD` format.
- You can apply multiple filters by chaining them with `&` in the URL.
- Make sure the date range you provide is correct to avoid unexpected results due to the nature of the `<` and `>` operators.

#### 5. **Other Filters**

In addition to filtering by date, you can apply filters on other fields (e.g., `email`, `nombre_completo`, etc.) using similar URL parameters. Just replace `created_at` with the relevant field name.

By following these guidelines, users can effectively filter data returned by the API using Laravel Purity.
