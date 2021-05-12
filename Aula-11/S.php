<?php

//Single-Reponsability

//EXEMPLO 1

class User {
    private $name;

    public function setName()
    {
        // Certo
    } 

    public function getName()
    {
        // Certo
    }

    public function sendEmail()
    {
        // Errado
    }

    public function generateReport()
    {
        // Errado
    }
}

// Como refatorar, levando em consideração o princípio de Single-Responsability

class User {
    private $name;

    public function setName()
    {
        // Implementação
    } 

    public function getName()
    {
        // Implementação
    }
}

class Email {
    public function sendEmail()
    {
        // Implementação
    }
}

class Report {
    public function generateReport()
    {
        // Implementação
    }
}

// EXEMPLO 2

class Report {
    private $data;

    public function setData(array $data)
    {
        // Certo 
    }

    public function exportAsPDF() {
        // Errado
    }

    public function exportAsCSV() {
        // Errado
    }
}

// Como refatorar, levando em consideração o princípio de Single-Responsability

class Report {
    private $data;

    public function setData(array $data)
    {
        // Implementação
    }
    
}

class ExportData {
    // Implementação
}

class ExportAsPDF extends ExportData {
    public function export() {
        // Implementação
    }
}

class ExportAsCSV extends ExportData {
    public function export() {
        // Implementação
    }
}

//EXEMPLO 3

class Post {
    private $title;

    public function setTile(string $title)
    {
        // Certo
    }

    public function generateFriendlyUrl()
    {
        // Errado
    }

    public function getSimilarPosts()
    {
        // Errado
    }
}

// Como refatorar, levando em consideração o princípio de Single-Responsability


class Post {
    private $title;

    public function setTile(string $title)
    {
        // Implementação
    }
}

class Url {
    public function generateFriendlyUrl()
    {
        // Implementação
    }
}

class Search {
    // Implementação
    
}

class SearchSimilar extends Search {
    public function search()
    {
        // Implementação
    }
}
