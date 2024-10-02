<?php

if (!function_exists('backend_build')) {
    /**
     * Build backend html with gabarit and navbar
     * @param string $body
     * @param string $title
     * @return string
     */
    function backend_build(string $body, string $title): string
    {
        $navbar = view("backend/navbar", ["title" => $title]);
        $gabarit = view("backend/gabarit", ["navbar" => $navbar, "body" => $body]);
        return $gabarit;
    }
}

if (!function_exists('public_build')) {
    /**
     * Build public html with gabarit and navbar
     * @param string $body
     * @return string
     */
    function public_build(string $body): string {
        $navbar = view("public/navbar");
        $gabarit = view("public/gabarit", ["navbar" => $navbar, "body" => $body]);
        return $gabarit;
    }
}

if (!function_exists('datatables')) {
    /**
     * Build datatables
     * @param string $id
     * @param array $headers
     * @param array $entries
     * @return string
     */
    function datatables(string $id, array $headers, array $entries, array $indexes): string
    {
        // Table structure
        $table_start = sprintf("<table id='%s' class='table table-striped table-bordered' style='width:100%%'>", htmlspecialchars($id, ENT_QUOTES));
        $table_end = "</table>";

        // Table header
        $thead = "<thead><tr>";
        foreach ($headers as $header) {
            $thead .= sprintf("<th>%s</th>", htmlspecialchars($header, ENT_QUOTES));
        }
        $thead .= "</tr></thead>";

        // Table body
        $tbody = "<tbody>";
        foreach ($entries as $entry) {
            $tbody .= "<tr>";
            foreach ($indexes as $index) {
                $tbody .= sprintf("<td>%s</td>", htmlspecialchars($entry->$index, ENT_QUOTES));
            }
            $tbody .= "</tr>";
        }
        $tbody .= "</tbody>";

        // Combine everything into the final table
        return $table_start . $thead . $tbody . $table_end;
    }
}