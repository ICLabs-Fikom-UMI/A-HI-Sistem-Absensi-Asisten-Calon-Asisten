 <?php
class Kehadiran{
    use Model;
    protected $table = 'kehadiran';
    protected $allowed_columns = [
        'nama',
        'status',
        'status_kedatangan'
    ];
}
